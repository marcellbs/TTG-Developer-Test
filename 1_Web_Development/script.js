const menuToggle = document.getElementById('menu-toggle');
const sidebar = document.querySelector('.sidebar');

menuToggle.addEventListener('click', function() {
  sidebar.classList.toggle('show'); // Menambah atau menghapus kelas 'show' pada sidebar
});


const testimonialSlider = document.querySelector('.testimonial-slider');
const testimonialCards = testimonialSlider.querySelectorAll('.testimonial-card');

let currentIndex = 0;

function moveSlider() {
  currentIndex = (currentIndex + 1) % testimonialCards.length;
  const offset = -currentIndex * 100;
  testimonialSlider.style.transform = `translateX(${offset}%)`;
}

setInterval(moveSlider, 6000); // Ganti testimonial setiap 5 detik

moveSlider(); // Tampilkan testimonial pertama saat halaman dimuat

