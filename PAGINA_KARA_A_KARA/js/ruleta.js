(function() {
  const ruleta = document.querySelector('#estilo1');
  const Boton_inicio = document.querySelector('#estilo2');
  let deg = 0;

  Boton_inicio.addEventListener('click', () => {
    Boton_inicio.style.pointerEvents = 'none';
    deg = Math.floor(2000 + Math.random() * 2000);
    ruleta.style.transition = 'all 10s ease-out';
    ruleta.style.transform = `rotate(${deg}deg)`;
    ruleta.classList.add('blur');
  });

  ruleta.addEventListener('transitionend', () => {
    ruleta.classList.remove('blur');
    Boton_inicio.style.pointerEvents = 'auto';
    ruleta.style.transition = 'none';
    const actualDeg = deg % 360;
    ruleta.style.transform = `rotate(${actualDeg}deg)`;   
    let g="";
    /*setTimeout(() => {
      switch (actualDeg) {
        case actualDeg > 0 && actualDeg <= 72:
          g="3";
         //datosClientes(g)
         break;
         case actualDeg > 72 && actualDeg <= 144:
          g="4";
          //datosClientes(g)
         break;
         case actualDeg > 144 && actualDeg <= 216:
          g="1";
          //datosClientes(g)
         break; 
         case actualDeg > 216 && actualDeg <= 288:
          g="2";
          //datosClientes(g)
         break;
         case actualDeg > 288 && actualDeg <= 360:
          g="5";
          //datosClientes(g)
         break; 
      }
      //console.log("algo2");
      //datosClientes(g);


    }, 1000);*/
    if( actualDeg > 0 && actualDeg <= 72)
          g="3";
         //datosClientes(g)
         
         if( actualDeg > 72 && actualDeg <= 144)
          g="4";
          //datosClientes(g)
         
         if( actualDeg > 144 && actualDeg <= 216)
          g="1";
          //datosClientes(g)
          
         if( actualDeg > 216 && actualDeg <= 288)
          g="2";
          //datosClientes(g)
         
         if( actualDeg > 288 && actualDeg <= 360)
          g="5";
    console.log("grado"+actualDeg);
    console.log("genero:" + g);
    datosClientes(g);
  });

})();

function datosClientes(g){
  let s=getRandomArbitrary(1,4);
  let  gen = g;
  console.log("Ruleta(genero)"+gen);
  console.log("Random(cancion):"+s);
  let fDatos = new FormData()
  fDatos.append("variablePost","123");
  fDatos.append("cancion",""+s+"");
  fDatos.append("genero",""+gen+"");
  let r = new XMLHttpRequest();
  r.open("POST","php/Canciones.php");
  //console.log(r);
  r.onreadystatechange = function(){
      console.log( this.readyState  );
      if(this.readyState == 4 && this.status == 200){
        let datos = JSON.parse( this.responseText );
          //console.log(datos);
        let elemento = document.getElementById("dvDatos");
        let str = "";
        let strV="";
        let srcV="";
        let dvVideo = document.getElementById("dvVideo");
        for(x=0;x<datos.length;x++){
             str += "<p>"+datos[x].Titulo + "<br>";
             //str += "<a id='song' href='"+datos[x].Link+"'>"+datos[x].Titulo+"111111111111111</a></p>";
            srcV=datos[x].Link;

         }
         elemento.innerHTML = str;
         strV="<iframe src='"+srcV+"' width='500' height='300'></iframe>";
         dvVideo.innerHTML = strV;
      }
  }
  r.send(fDatos);

}
function getRandomArbitrary(min, max) {
  return Math.floor((Math.random() * (max - min + 1)) + min);
}


/*<iframe width="560" height="315" src="https://www.youtube.com/embed/CY8E6N5Nzec" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>*/ 