function cetakPiramida() {
  const tingkat = parseInt(document.getElementById("tingkat").value);
  const outputDiv = document.getElementById("output");
  outputDiv.innerHTML = '';

  for (let i = tingkat; i >= 1; i--) {

      let baris = '';
      for (let j = 1; j <= i * 2 - 1; j++) {
          baris += '* ';
          outputDiv.style.border = '2px solid #0056b3';
          outputDiv.style.padding = '10px';
      }
      outputDiv.innerHTML += baris + '<br>';
  }

  if(tingkat === 0) {
    outputDiv.innerHTML = 'Tingkat tidak boleh kosong!';
  } else if(tingkat < 0) {
    outputDiv.innerHTML = 'Tingkat tidak boleh negatif!';
  }
}
