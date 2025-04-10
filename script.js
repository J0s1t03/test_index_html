function foo(){
    const form_data = {
        username: document.getElementById('user').value,
        password: document.getElementById('pwd').value,
    }

    fetch("login.php", {
        method: "POST",
        body: JSON.stringify(form_data),
        headers:{
            "Content-Type": "application/json; charset=UTF-8"
        }
    })
    .then(response => response.json())
    .then((response) =>{
        if(response.success){
            console.log("Data sent")
        }
        else{
            throw new Error(response.message);
        }
    })//por el momento funciona
}
