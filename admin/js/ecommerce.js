class Ecommerce {

    constructor() {
        this.api_key = "API_KEY=adsffsdfds6b-6727-46f4-8bee-2c6ce6293e41";
        this.api = "http://localhost/ecommpao/backend/api";
        this.actions = [ "products","category", "orders","users"];
        this.initRouter();
    }

    initRouter() {
        this.actions.forEach((action) => {
            document.getElementById(action).addEventListener("click", () => {
                fetch("templates/" +action+ ".html")
                    .then((response) => {
                        if (response.ok) {
                            return response.text();
                        } else {
                            console.log("Erreur de chargement du tempate");
                        }
                    }).then((data) => {
                        document.getElementsByClassName("container-fluid")[0].innerHTML = data;

                    })
            })
        })
    }
/*
Methode de recuperation des données
*/  
initDataApp(){
    this.actions.forEach((action) => {
        const url = this.api + action + "?" + this.api_key;
        fetch(url)
        .then((response) =>{
            if (response.ok)
            {
                return response.json()
            } else {
                console.log("Erreur de chargement des données");
            }
        }).then((response) =>{
            if (response.status == 200){

                localStorage.setItem(action, JSON.stringify(response.result));
            }


        }





    })  
        }
}
  





}


}
export { Ecommerce }


