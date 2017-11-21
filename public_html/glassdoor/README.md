Example application which uses Glassdoor api, ReactJS and C3 charts.

https://www.glassdoor.com/developer/index.htm
https://reactcommunity.org/
http://c3js.org/

You have to run chrome with following switch:
C:\Program Files (x86)\Google\Chrome\Application>chrome --user-data-dir="c:/temp/chrome_eng" --disable-web-security

It is because Glassdoor api is not ment to receive requests from browser. 
Therefore it does not contains Access-Control-Allow-Origin header and browser blocks this content. 
To overcome this you need to run chrome with --disable-web-security swith.  