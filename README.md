# assesment-SecurityEngineer-fajarmasputra
This repo is simple web application and simple signature based WAF 

Stacks Technology:
1. PHP
2. MYSQL
3. Telegram Chatbot

Installation:


1. First make sure you have apache and MySQL. Or maybe for better experience if you are using Windows, you can download XAMPP. here: https://www.apachefriends.org/download.html
2. You can pull or download this source code to local system, and put in on htdocs file where xampp file already installed. You can see again here for easier steps: https://www.youtube.com/watch?v=2HBDUgMXrBI
3. You have to generate token_id and chat_id from telegram because alerting system for Betaservice using Telegram. Use the /newbot command to create a new bot. The Bot Father will ask you for a name and username, then generate an authorization token for your new bot. https://www.siteguarding.com/en/how-to-get-telegram-bot-api-token
4. In order to get the group chat id, do as follows:
   Add the Telegram BOT to the group. Get the list of updates for your BOT: https://api.telegram.org/bot<YourBOTToken>/getUpdates
    Example:
    https://api.telegram.org/bot123456789:jbd78sadvbdy63d37gda37bd8/getUpdates
    Look for the "chat" object: {"update_id":8393,"message":{"message_id":3,"from":{"id":7474,"first_name":"AAA"},"chat":{"id" <group_ID>,"title":""},"date":25497,"new_chat_participant":{"id":71,"first_name":"NAME","username":"YOUR_BOT_NAME"}}}
    This is a sample of the response when you add your BOT into a group. Use the "id" of the "chat" object to send your messages.
5. After you are ready for it. You can start WebService and Database Service (Start Apache and MySQL):
 ![image](https://user-images.githubusercontent.com/22582193/144706374-e29b8b44-b8e7-4557-9b87-1b9719a2f9cb.png)
6. Access your site from browser localhost/xampp/<name ur folder>. And here the main page:
   ![image](https://user-images.githubusercontent.com/22582193/144706461-fbc93a21-2717-4297-aef9-7434d9e07c2d.png)
7. After it you can start explore the Website. There are some bug that you can exploits. And all of the alert will send to Telegram like this:
   ![WhatsApp Image 2021-12-04 at 17 38 55](https://user-images.githubusercontent.com/22582193/144706522-bc759cd3-dd7e-4449-8ddf-cc5945c0b6f3.jpeg)![WhatsApp Image 2021-12-04 at 17 38 56](https://user-images.githubusercontent.com/22582193/144706529-b18a4bea-0300-48e6-a19e-4c7948cb521f.jpeg)g
8. Bug: login ByPass with SQL Injection, Cross Site Scripting using Search Query, Cross Site Scripting URL
  

   
 


