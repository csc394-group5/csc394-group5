import requests
from lxml import html
from bs4 import BeautifulSoup
from bs4 import NavigableString
from bs4 import Tag

text = ""

# Method scrapes monster.com for the given job query for the number of results' pages
def scrapeJobPostings(query, pages):
    numPages = pages
    url = "https://www.monster.com/jobs/search/?q={}&intcid=skr_navigation_nhpso_searchMain"
    links = []

    for page in (1, pages):
        if page == 1:
            page = requests.get(url.format(query))
        else:
            page = requests.get(url.format(query) + "&page{}".format(page))
        tree = html.fromstring(page.content)
        links += tree.xpath('//*[@class="jobTitle"]//a/@href')

    if not links:
        return None
    else:
        return links


# Helper method to parse a job posting at the given url
def parsePosting(url):
    page = requests.get(url)
    soup = BeautifulSoup(page.content, "lxml")
    # print(soup.prettify())

    root = soup.findChild(id="TrackingJobBody")
    parseNodes(root)

# Main method used to parse the job description of the given job node
def parseNodes(node):
    global text
    if node is not None:
        if node.string is not None:
            text += " "
            text += node.string
        if node.children is not None:
            for child in node.children:
                if type(child) is NavigableString:
                    text += " "
                    text += child
                elif type(child) is Tag:
                    parseNodes(child)

# returns a json of job postings with the given job
def getjobs(job, pages):
    urls = scrapeJobPostings(job, pages)
    json = ""
    x = 1
    json += "["
    for i in range(0, len(urls)):
        json += "\"{}\"".format(urls[i])
        x += 1
        if i != len(urls) - 1:
            json += ","
        if (x == i):
            break
    json += "]"

    return json

# main method used to conglomerate job postings for the 10 jobs for this project
if __name__ == "__main__":
    query = ["Mobile Application Developer", "Database Administrator", "Software Engineer", "IT Security Specialist",
             "Computer Systems Analyst", "Web Developer", "Software Developer", "Data Scientist", "Quality Assurance",
             "User Experience"]

    # attempt to search monster.com for each job title in the query array,
    #  and output job posting url's to individual file
    try:
        for job in query:
            urls = scrapeJobPostings(job, 1)
            fileName = '{}.txt'.format(job)
            f = open(fileName, 'w', encoding='utf-8')
            for url in urls:
                global text
                parsePosting(url)
                print(url + "\n" + text + "\n")
                f.write(url + "\n" + text + "\n" + "\n")
                text = ""
            # Close file
            print("Query done.")
            f.close()
    except None:
        print("Search failed.")
