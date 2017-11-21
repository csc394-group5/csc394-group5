import requests
from lxml import html

# returns array of job urls for the given query and for the number of search result pages
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

# Method finds job postings for the given amount of page results and outputs them to a text file
def findJobs(job, pages):
    try:
        array = scrapeJobPostings(job, 1)
        fileName = '{}.txt'.format(job)
        f = open(fileName, 'w', encoding='utf-8')
        for url in array:
            f.write("{}".format(url) + "\n")
        f.close()
    except None:
        print("Scraping failed")

if __name__ == "__main__":

    # query = ["Mobile Application Developer", "Database Administrator", "Software Engineer", "IT Security Specialist", "Computer Systems Analyst",
    #          "Web Developer", "Software Developer", "Data Scientist", "Quality Assurance", "User Experience"]

    findJobs("Database Administrator", 1)


