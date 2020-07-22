from bs4 import BeautifulSoup as soup
import urllib.request as urllib2
import csv
import pandas as pd
import requests
import sqlalchemy

def main(request):

    #India and World



    req = urllib2.Request('https://www.worldometers.info/coronavirus/')
    req.add_header('User-Agent', 'Mozilla/5.0')
    resp = urllib2.urlopen(req)
    page_html=resp.read()
    resp.close()

    page_soup=soup(page_html,'html.parser')
    table=page_soup.findAll("table",{"id":"main_table_countries_today"})
    table = page_soup.find_all('table')[0] 
    lists=[]
    rows = table.findAll("tr")
    
    for row in rows:
        csv_row = []
        for cell in row.findAll(["td", "th"]):
            csv_row.append(cell.get_text())
        lists.append(csv_row)
    df = pd.DataFrame(lists) 
    df=df.iloc[8:20,1:9]
    world_tot_cases=""
    india_tot_cases=""
    for i in df.iterrows():
        if(i[1][1]=="India"):
            india_tot_cases=str(i[1][2])
            india_new_cases=str(i[1][3])
            india_tot_deaths=str(i[1][4])
            india_new_deaths=str(i[1][5])
            india_active=str(i[1][8])
        elif(i[1][1]=="World"):
            world_tot_cases=str(i[1][2])
            world_new_cases=str(i[1][3])
            world_tot_deaths=str(i[1][4])
            world_new_deaths=str(i[1][5])
            world_active=str(i[1][8])
    

    #Telangana
    
    req = urllib2.Request('https://www.mygov.in/covid-19/')
    req.add_header('User-Agent', 'Mozilla/5.0')
    resp = urllib2.urlopen(req)
    page_html=resp.read()
    resp.close()
    page_soup=soup(page_html,'html.parser')
    table=page_soup.findAll("table",{"id":"state-covid-data"})
    table = page_soup.find_all('table')[0] 
    lists=[]
    rows = table.findAll("tr")    
    for row in rows:
        csv_row = []
        for cell in row.findAll(["td", "th"]):
            csv_row.append(cell.get_text())
        lists.append(csv_row)
    df = pd.DataFrame(lists) 
    #print(df)
    tg=df.iloc[33,:]
    tg_tot_cases=str(tg[1])
    tg_active_cases=str(tg[2])
    tg_death_cases=str(tg[4])
    



    def SendMessage(number,answer):
        url = "https://www.fast2sms.com/dev/bulk"
        payload = "sender_id=FSTSMS&message="+answer+"&language=english&route=p&numbers="+str(number)
        headers = {'authorization': "" ,'Content-Type': "application/x-www-form-urlencoded",'Cache-Control': "no-cache",}
        response = requests.request("POST", url, data=payload, headers=headers)
        print(response.text)

    
   
    
    def select():
        connection_name = ""
        table_name = "sms_subscribers"
        db_name = "sms_subscribers"
        db_user = ""
        db_password = ""
        driver_name = 'mysql+pymysql'
        query_string = dict({"unix_socket": "/cloudsql/{}".format(connection_name)})
        request_json = request.get_json()
        stmt = sqlalchemy.text('select Number from sms_subscribers')        
        db = sqlalchemy.create_engine(
        sqlalchemy.engine.url.URL(
            drivername=driver_name,
            username=db_user,
            password=db_password,
            database=db_name,
            query=query_string,
        ),
        pool_size=5,
        max_overflow=2,
        pool_timeout=30,
        pool_recycle=1800
        )
        numbers=""
        try:
            with db.connect() as conn:
                result = conn.execute(stmt)
                for row in result:                    
                    numbers=numbers+str(row['Number'])+','
            return numbers
        except Exception as e:
            SendMessage('','Database connection failed'+'Error: {}'.format(str(e)))
            return ""            
        
    answ="\nWORLD\nTotal:"+world_tot_cases+"\nFatal:"+world_tot_deaths+"\nActive:"+world_active
    ansi="\nINDIA\nTotal:"+india_tot_cases+"\nFatal:"+india_tot_deaths+"\nActive:"+india_active
    anst="\nT-GANA\nTotal:"+tg_tot_cases+"\nFatal:"+tg_death_cases+"\nActive:"+tg_active_cases
    answer=answ+ansi+anst

    print(answer) 
    numbers=select()
    print(numbers) 
    SendMessage(numbers,answer) 