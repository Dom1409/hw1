


function onjson(json){

    const gioco_tot=document.querySelector('#contenuto');

    const result = json[valore].data;
   
    //creo il mio box
     const gioco=document.createElement('div');
    gioco.classList.add('gioco');
  //titolo
    const title = document.createElement('span');
    tit=result.name;
    let titolo = result.name;
    title.textContent=titolo;
    title.classList.add('title');
    
    //image_header
    const image_header=document.createElement('img');
    image_header.src=result.header_image;
    img=result.header_image;
    const contenitore_immagine=document.createElement('div');
    contenitore_immagine.classList.add('contenitore_immagine');
    image_header.classList.add('immagine_header');
    contenitore_immagine.appendChild(image_header);


    //descrizione_gioco
    
    const descrizione=document.createElement('div');
    descrizione.textContent="Descrizione";
    descrizione.classList.add("descr");
    const descizione_generale=document.createElement('div');
    descizione_generale.classList.add('descrizione_generale');
    const contenitore=document.createElement('div');
    contenitore.classList.add('contenitore_descrizione');
    contenitore.appendChild(descizione_generale);
    let general_description=result.about_the_game;
    descizione_generale.innerHTML=general_description;

    
    //requisiti minimi per poter giocare
    const requisiti=document.createElement('div');
    requisiti.textContent="Requisiti Minimi";
    requisiti.classList.add("descr");
    const requisiti_minimi=document.createElement('div');
    requisiti_minimi.classList.add('requisiti');
    let requisiti_minimi_richiesti=result.pc_requirements.minimum;
    requisiti_minimi.innerHTML=requisiti_minimi_richiesti;


   



    gioco.appendChild(title);
    gioco.appendChild(contenitore_immagine);
    gioco.appendChild(descrizione);
    gioco.appendChild(contenitore);
    gioco.appendChild(requisiti);
    gioco.appendChild(requisiti_minimi);
    
     //screenshot
     const screen=document.createElement('div');
     screen.textContent="Foto Gioco";
     screen.classList.add("descr");
     gioco.appendChild(screen);

     if (result.screenshots.length > 0) {
        const screenshotsContainer = document.createElement('div');
        screenshotsContainer.classList.add('contenitore_screen');

        for (let i = 0; i < result.screenshots.length; i++) {
            const screenshot = result.screenshots[i];
            const screen_gioco = document.createElement('img');
            screen_gioco.src = screenshot.path_thumbnail;
            screenshotsContainer.appendChild(screen_gioco);
            screen_gioco.classList.add('screen_thumbnail');
          }
          gioco.appendChild(screenshotsContainer);
     }
   


    gioco_tot.appendChild(gioco);

    
    console.log(result);


}


let valore=sessionStorage.getItem('valore');
let formdata=new URLSearchParams();
formdata.append('valore',valore);


let response =  fetch('api_steam.php',{
    method: 'POST',
    headers:{
        'Content-Type': 'application/x-www-form-urlencoded'
    },
    body:formdata  
})
.then(dispatchResponse)
.then(data=>onjson(data));
    


function dispatchResponse(response) {

    console.log(response);
    return response.json();
  }
  
  function dispatchError() { 
    console.log("Errore");
  }



function ritorna_home(){

    location.href="homerto.php";
}


const btn_home=document.querySelector("#btn_home");
btn_home.addEventListener('click',ritorna_home);






function aggiungilista(){

    const data= new FormData();

    data.append('nome',tit);
    data.append('image',img);
  console.log(img);
    fetch("description_games.php", {method: 'post', body: data}).then(dispatchResponse).then(data=>console.log(data));

}

let img;
let tit;
const btn_desideri=document.querySelector("#btn_desideri");
btn_desideri.addEventListener('click',aggiungilista);
   






const btn_visualizza_desideri=document.querySelector("#btn_visualizza_desideri");

btn_visualizza_desideri.addEventListener('click',()=>{
  
    location.href="visualizza_wishlist.php";
    
});
