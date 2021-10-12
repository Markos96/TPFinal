function search(name) {
  fetchSearchData(name);
}

function fetchSearchData(name){
  fetch("search.php", {
    method : 'POST',
    body : new URLSearchParams('name=' + name)
  })
  .then(res => res.text())
  .then(res => console.log(res))
}
