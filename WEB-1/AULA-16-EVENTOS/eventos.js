

function darkMode(){
   console.log("Modo escuro.");
}

window.addEventListener("load", () => {
   const button = document.querySelector("#dark");
   button.style.backgroundColor = 'red';

   button.addEventListener("click", () => {darkMode()});
});
