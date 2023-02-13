function allCloseAlertButtons() {
    let allCloseAlertButtons = document.querySelectorAll(".btn-alert-close");

    allCloseAlertButtons.forEach( (button) => {
        button.addEventListener( "click", () => {
            let div = button.parentNode;
            div.parentNode.removeChild(div);
        })
    });
}

export default allCloseAlertButtons;