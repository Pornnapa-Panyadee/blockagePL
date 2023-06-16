
const chatButtonAdmin = document.querySelector('.chatbox_button_admin');
const chatContentAdmin = document.querySelector('.chatbox_support_admin'); 

const icons = {
    isClicked: '???',
    isNotClicked: '???'
}



const chatboxAdmin = new InteractiveChatbox(chatButtonAdmin, chatContentAdmin, icons);
chatboxAdmin.display();