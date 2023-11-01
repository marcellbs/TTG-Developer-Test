-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Nov 2023 pada 23.09
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `books`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `year` date NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `page_count` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `title`, `author`, `year`, `publisher`, `summary`, `page_count`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Jujutsu Kaisen (Sorcery Fight)', 'Gege Akutami', '2018-03-05', 'Shueisha', 'Yuji Itadori adalah siswa sekolah menengah yang sangat bugar dan tinggal di Sendai. Di ranjang kematiannya, kakeknya menanamkan dua pesan kuat dalam diri Yuji: \"selalu membantu orang lain\" dan \"mati dikelilingi orang\". Teman-teman Yuji di Klub Ilmu Gaib menarik Kutukan ke sekolah mereka saat mereka membuka segel jimat jari busuk. Yuji menelan jarinya untuk melindungi Penyihir Jujutsu Megumi Fushiguro, menjadi tuan rumah Kutukan kuat bernama Ryomen Sukuna. Karena sifat jahat Sukuna, semua penyihir diharuskan untuk segera mengusirnya (dan, lebih jauh lagi, Yuji). Namun setelah melihat Yuji mempertahankan kendali atas tubuhnya, guru Megumi, Satoru Gojo, membawanya ke Sekolah Menengah Jujutsu Prefektur Tokyo dengan usulan kepada atasannya: menunda hukuman mati Yuji dan berlatih di bawah bimbingan Gojo sampai dia menghabiskan seluruh 20 jari Sukuna sehingga Kutukan bisa terjadi. dihilangkan. Pada saat yang sama, sekelompok Roh Terkutuk merencanakan serangan berlapis-lapis terhadap dunia sihir Jujutsu, termasuk Roh Terkutuklah Mahito dan seorang penyihir korup bernama Suguru Geto, yang dieksekusi oleh Gojo setahun sebelumnya.', 100, 'jujutsu-kaisen.jpg', '2023-11-01 13:19:34', '2023-11-01 13:19:34'),
(6, 'Kimetsu No Yaiba (Demon Slayer)', 'Koyoharu Gotoge', '2016-02-15', 'Weekly Shōnen Jump', 'Tanjiro Kamado is a kind-hearted and intelligent boy who lives with his family in the mountains. After his father\'s death, he became his family\'s breadwinner, traveling to the nearby village to sell charcoal. One day, he came home and discovers his family was attacked and slaughtered by a demon. His sister Nezuko, the sole survivor of the incident, has been transformed into a demon, but still surprisingly shows signs of human emotion and thought. After an encounter with Giyu Tomioka, the Water Hashira of the Demon Slayer Corps, Tanjiro is recruited by Giyu and sent to his retired master Sakonji Urokodaki for training to also become a Demon Slayer, beginning his quest to help Nezuko turn into a human again.', 500, '1698852056_Demon_Slayer_-_Kimetsu_no_Yaiba,_volume_1 (1).jpg', '2023-11-01 15:20:57', '2023-11-01 15:20:57');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
