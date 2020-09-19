# UniHub
UniHub is a website for students, teachers and administrators of a university. It brings these people closer by providing a professional platrform where they can change informations, annoucements, documents and more, especialy in times like these where the majority work from home because of the pandemic.

## Setup 
1. Either fork or download the app and open the folder in your ide of choice
2. Install Larvel 7 https://laravel.com/docs/8.x/installation
3. Install web server solution stack package like XAMPP
4. To use the chat function you need to get your Pusher informations by creating your own Pusher account and changing PUSHER_APP_ID, PUSHER_APP_KEY, PUSHER_APP_SECRET in your **.env** file for more check https://pusher.com . 

## How to use UniHub 
Since every one uses some kind of social media platform, UniHub is builed prettymuch arround the same style so it will be much easier for users to use it without a problem     
    1. you need to create an account and wait for the activation from the admin 
    2. if you already have an account you can login then you can use all the featers avalible 

## Features 
### Login & Resgistration pages
- In the menu bar you have the option to login or register "sign up" 
- If you are a new user you need to register all your information in the registration page 
- A new user can't access his account until the its activation from the admin who verify if the user study in the university by checking the accuracy of the informations 
- you can enter you login informations (email address & password) if you have already an account 
### Home page
- The home screen is divided into three sections 
    * The first section has some of the user's informations and the list of groups or users he can contact 
    * The second sections divided to two sections:
        1. Posting space where every user can post new images or text, and each post has two categories: **The major concerned by the post** & **The post's type** 
        2. The feed: where the user can see others posts 
    * The last secotion is for messaging, which can be between: **a delegate and an Admin or a Teacher** or vice versa 
### Menu bar 
#### Students & Teachers
- Each user has 3 option 
    1. **Profile:** a link to the profile page where the user can chage his profile image, and bio 
    2. **Order Documents:** for ordering administrative documents from the administration 
    3. **Logout:** for signing out from the account, _by default every account get singed out if it's in use for more then 60min "for security reasons"_
#### Admin 
- Every university can have one or more admins, the first one is added by the developer '_in this case it's me_' and he has additional options:
    1. **Group Settings:** in this page the user can add or modify a group chat
        * **Create Group** a new group requires a name and members (the classes and users)
        * **Modify Group** Modifying an existing group by adding or removing users from the group 
    2. **Activate User** in this page the admin see the list of the new sign ups with some user's informations and he can accept or dicline requestes 
    3. **Add Users** Professors and other admins are added from this page by the admin 
    4. **View Orders** the admin sees the list of requests for document 
    5. **Modify Statut** Here the admin can change the user's role from a student to a delegate or vice versa using the user's id 
## Upcoming Features
- Uploading different types of files 
- Downloading posts 
- Repporting posts 
## Contact
Oussama Alaoui Ismaili - ousalis99@gmail.com
Project Link: https://github.com/OussamaAlaoui/Budget-app
