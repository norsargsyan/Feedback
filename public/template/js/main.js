window.onload = function(){
    let deleteIcons = document.querySelectorAll('.delete-icon');
    let markAsReadIcons = document.querySelectorAll('.read-icon');
    for(let i = 0; i < deleteIcons.length; i++)
    {
        deleteIcons[i].addEventListener('click', deleteItem, false);
    }
    for(let i = 0; i < deleteIcons.length; i++)
    {
        markAsReadIcons[i].addEventListener('click', readItem, false);
    }
    function deleteItem(event)
    {
        let id = event.target.dataset.id;
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if(this.responseText){
                    removeFadeOut(document.getElementById('item' + id));
                    swal({
                        title: "Message successfully deleted!",
                        icon: "success",
                    });
                    setTimeout(getReload ,400);
                }
            }
        };
        xhttp.open("POST", "/messages/delete/" + id, true);
        xhttp.send();
    }
    function getReload()
    {
        location.reload();
    }
    function readItem(event)
    {
        let id = event.target.dataset.id;
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if(this.responseText == 0)
                {
                    event.target.src = "/template/img/email.svg";
                    document.getElementById('item' + id).classList.add("readed");

                }
                else
                {
                    event.target.src = "/template/img/email-green.svg";
                    document.getElementById('item' + id).classList.remove("readed");
                }
            }
        };
        xhttp.open("POST", "/messages/readed/" + id, true);
        xhttp.send();
    }

    function removeFadeOut(el) {
        el.style.transition = "opacity .3s ease";
        el.style.opacity = 0;
        setTimeout(function() {
            el.parentNode.removeChild(el);
        }, 300);
    }
}