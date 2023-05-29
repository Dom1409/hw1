
function onjson(json){

    const contenuto=document.querySelector("#contenuto");
   let click=0;

        if(json.length===0){
            const vuoto=document.createElement('p');

                vuoto.textContent="La tua lista è vuota aggiungi un gioco alla tua lista";
                vuoto.classList.add('vuoto');
                contenuto.appendChild(vuoto);

        }


    for(let i=0; i<json.length;i++){

        const result=json[i];      
        console.log(result);

        const content=JSON.parse(result.content);

        
 const elementi=document.createElement('div');
 elementi.classList.add('desideri');
        
        //nome

        const nome=document.createElement('span');
        let nom=content.nome;
       
        nome.textContent=nom;
       nome.classList.add('nomi');
        elementi.appendChild(nome);

        //immagine
       
        const image=document.createElement('img');
        image.src=content.image;
       
        elementi.appendChild(image);


        //button
        const button_elimina=document.createElement('button');
            button_elimina.textContent="Elimina";
            button_elimina.classList.add('btn_elimina');
            elementi.appendChild(button_elimina);



        contenuto.appendChild(elementi);
        click++;
        console.log(click);
        }

        const all_button=document.querySelectorAll(".desideri .btn_elimina");

        for(const box of all_button){
            box.addEventListener('click',()=>{
click--;
                
                if(click===0){
                    const vuoto=document.createElement('p');
                    vuoto.classList.add('vuoto');
                        vuoto.textContent="La tua lista è vuota aggiungi un gioco alla tua lista";
                        
                        contenuto.appendChild(vuoto);
        
                }

                    box.parentNode.remove();
                    
                    console.log(click);
                    const nome_da_eliminare = box.parentNode.querySelector('span').textContent;
                eliminaElemento(nome_da_eliminare)});
        }

}


function dispatchResponse(response) {

    console.log(response);
    return response.json();
  }


fetch("get_wishlist.php").then(dispatchResponse).then(data=>onjson(data));




    function eliminaElemento(nome_elemento) {
        console.log(nome_elemento);
        const data = new FormData();
        data.append('nome_elemento', nome_elemento);
      
        fetch("elimina_elemento.php", { method: 'POST', body: data })
          .then(dispatchResponse).then(data=>console.log(data));

}











function ritorna_indietro(){

    location.href="description_games.php";
}


const btn_indietro=document.querySelector("#btn_indietro");
btn_indietro.addEventListener('click',ritorna_indietro);



function ritorna_home(){

    location.href="home.php";
}


const btn_home=document.querySelector("#btn_home");
btn_home.addEventListener('click',ritorna_home);


