class Ecommerce {

    constructor() {
        this.api_key = "API_KEY=adsffsdfds6b-6727-46f4-8bee-2c6ce6293e41";
        this.api = "http://localhost/ecommerce/backend/api/";
        this.actions = ['orders', 'users', 'category', 'products'];  
        this.initRouter();
    }

    initRouter(){
        this.actions.forEach((action) => {
            document.getElementById(action).addEventListener('click', () => {
                fetch('templates/' + action + '.html')
                .then((response) => {
                    if (response.ok) {
                        return response.text();
                    } else {
                        console.log('Erreur de chargement du tempate');
                    }
                }).then((data) => {
                    document.getElementsByClassName('container-fluid')[0].innerHTML = data;

        })

    }

}
   

export { Ecommerce }