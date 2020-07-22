
## CovidSMS
A web application that collects the data about the novel coronavirus from notable sources such as [https://worldometers.info/coronavirus/](https://worldometers.info/coronavirus/) and [https://www.mygov.in/covid-19/](https://www.mygov.in/covid-19/) about the no. of Total, active ,deaths and recovered cases across the Globe, India and Telangana. The application' is made available at covidsms.2bz.in where a user can subscribe with his mobile number to get daily updates.
### Process Flow

 - The user data is collected at the website and sent to the google cloud server of the admin account tarunkodakandla@gmail.com.
 - The Google cloud function uses python to scrape the covid updates from the above mentioned standard sites.
 - The cloud schedluer schedules the above function to execute everyday at a given time (similar to a cronjob).
 - The function extracts the mobile numbers from cloud SQL and sends the SMS using Fast2SMS API.

### Tech-Stack:
 - Python 
 - BeautifulSoup4
 - Fast2SMS API
 - Google Cloud Functions
 -  Google Cloud Scheduler
 - Cloud SQL