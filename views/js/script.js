
function search(name) {
  fetchSearchData(name);
}

function fetchSearchData(name){
  console.log(list);  
  console.log(name); 
}

document.addEventListener("DOMContentLoaded", () => {
  const list = document.getElementById('info');

  console.log(list.childNodes)
  //console.log(includes(list.children));
  
})