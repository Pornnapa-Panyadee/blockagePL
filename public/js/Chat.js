class InteractiveChatbox {
    constructor(a, b, c) {
        this.args = {
            button: a,
            chatbox: b
        }
        this.icons = c;
        this.state = false; 
    }

    display() {
        const {button, chatbox} = this.args;
        
        button.addEventListener('click', () => this.toggleState(chatbox))
    }

    toggleState(chatbox) {
        this.state = !this.state;
        this.showOrHideChatBox(chatbox, this.args.button);
    }

    showOrHideChatBox(chatbox, button) {

        let userSelection = document.getElementsByClassName('btn-close');

        for(let i = 0; i < userSelection.length; i++) {
          (function(index) {
            userSelection[index].addEventListener("click", function() {
                chatbox.classList.remove('chatbox--active')
                this.state = false;
             })
          })(i);
        }

        if(this.state || this.state === undefined) {
            chatbox.classList.add('chatbox--active')
            // this.toggleIcon(true, button);
        } else if (!this.state) {
            chatbox.classList.remove('chatbox--active')
            // this.toggleIcon(false, button);
        }
    }

    toggleIcon(state, button) {
        const { isClicked, isNotClicked } = this.icons;
        let b = button.children[0].innerHTML;

        if(state) {
            button.children[0].innerHTML = isClicked; 
        } else if(!state) {
            button.children[0].innerHTML = isNotClicked;
        }
    }
}