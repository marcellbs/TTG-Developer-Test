function generateGroups() {
  const jumlahBilangan = parseInt(document.getElementById("jumlahBilangan").value);
  const jumlahKelompok = parseInt(document.getElementById("jumlahKelompok").value);

  // pengondisian untuk mengecek apakah inputan jumlahBilangan dan jumlahKelompok valid
  if (isNaN(jumlahBilangan) || isNaN(jumlahKelompok)) {
    alert("Masukkan jumlah bilangan dan jumlah kelompok yang valid.");
    return;
  } else if(jumlahBilangan == 0 || jumlahKelompok == 0) {
    alert("Jumlah bilangan, jumlah kelompok, atau keduanya tidak boleh kosong!");
    return;
  } else if(jumlahBilangan < 0 || jumlahKelompok < 0) {
    alert("Jumlah bilangan, jumlah kelompok, atau keduanya tidak boleh negatif!");
    return;
  } else if(jumlahBilangan < jumlahKelompok) {
    alert("Jumlah bilangan tidak boleh lebih kecil dari jumlah kelompok!");
    return;
  }
  

  const bilanganGenap = [];
  for (let i = 2; bilanganGenap.length < jumlahBilangan; i += 2) {
    bilanganGenap.push(i);
  }
  console.log(bilanganGenap);

  // mekanisme cara kerja slice:
  // misal 
  // jumlahBilangan = 7
  // jumlahKelompok = 3
  // maka jumlahBilangan / jumlahKelompok = 2.3
  // maka kelompok pertama adalah bilanganGenap.slice(0, 2.3) = bilanganGenap.slice(0, 2) = [2, 4]
  // maka kelompok kedua adalah bilanganGenap.slice(2.3, 4.6) = bilanganGenap.slice(2, 4) = [6, 8]

  // misal
  // jumlahBilangan = 9
  // jumlahKelompok = 5
  // maka jumlahBilangan / jumlahKelompok = 1.8
  // maka kelompok pertama adalah bilanganGenap.slice(0, 1.8) = bilanganGenap.slice(0, 1) = [2]
  // maka kelompok kedua adalah bilanganGenap.slice(1.8, 3.6) = bilanganGenap.slice(1, 3) = [4, 6]

  const result = [];
  for (let i = 0; i < jumlahKelompok; i++) {
    const kelompok = bilanganGenap.slice(i * (jumlahBilangan / jumlahKelompok), (i + 1) * (jumlahBilangan / jumlahKelompok));
    result.push(kelompok);

  }

  console.log(result);

  const resultDiv = document.getElementById("result");
  resultDiv.innerHTML = "";
  result.forEach((kelompok, index) => {
    const kelompokDiv = document.createElement("div");
    kelompokDiv.textContent = `Kelompok ${index + 1}: [${kelompok.join(", ")}]`;
    resultDiv.appendChild(kelompokDiv);
  });
}
