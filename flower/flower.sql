-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Des 2023 pada 16.36
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flower`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `flowers`
--

CREATE TABLE `flowers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL CHECK (char_length(`description`) >= 15),
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `flowers`
--

INSERT INTO `flowers` (`id`, `name`, `description`, `price`) VALUES
(1, 'Rose', 'Symbol of love and romance, comes in various colors.', 20000),
(2, 'Sunflower', 'Bright and cheerful, follows the sun.', 15000),
(3, 'Tulip', 'Graceful and elegant, signifies perfect love.', 25000),
(4, 'Lily', 'Elegant and fragrant, associated with purity.', 30000),
(5, 'Daisy', 'Simple and cheerful, symbolizes innocence.', 10000),
(6, 'Orchid', 'Exotic and delicate, represents beauty.', 35000),
(7, 'Carnation', 'Diverse colors, symbolizes love and fascination.', 12000),
(8, 'Chrysanthemum', 'Various forms, symbolizes loyalty and honesty.', 18000),
(9, 'Iris', 'Graceful and vibrant, symbolizes faith and wisdom.', 22000),
(10, 'Peony', 'Large and fragrant, represents prosperity.', 40000),
(11, 'Dahlia', 'Diverse shapes and colors, symbolizes elegance.', 28000),
(12, 'Hydrangea', 'Clusters of blooms, signifies heartfelt emotions.', 32000),
(13, 'Marigold', 'Vibrant orange and yellow, symbolizes passion.', 15000),
(14, 'Lavender', 'Fragrant herb, known for its calming aroma.', 12000),
(15, 'Poppy', 'Bold and vibrant, symbolizes remembrance.', 10000),
(16, 'Bluebell', 'Delicate blue flowers, symbolize gratitude.', 14000),
(17, 'Jasmine', 'Fragrant white flowers, symbolize purity and grace.', 25000),
(18, 'Daffodil', 'Yellow blooms, represent new beginnings.', 20000),
(19, 'Zinnia', 'Bright and colorful, symbolizes endurance.', 15000),
(20, 'Camellia', 'Elegant and timeless, symbolizes admiration.', 30000),
(21, 'Azalea', 'Vibrant and showy, symbolizes femininity.', 18000),
(22, 'Forget-Me-Not', 'Small and delicate, symbolizes true love.', 10000),
(23, 'Foxglove', 'Tall spikes of tubular flowers, attracts bees.', 22000),
(24, 'Geranium', 'Colorful blooms, known for mosquito-repelling properties.', 12000),
(25, 'Honeysuckle', 'Fragrant and attracts hummingbirds.', 25000),
(26, 'Magnolia', 'Large, fragrant blossoms, symbolize purity.', 35000),
(27, 'Pansy', 'Brightly colored with \"faces,\" symbolizes love.', 15000),
(28, 'Snapdragon', 'Unique dragon-shaped flowers, symbolize strength.', 20000),
(29, 'Sweet Pea', 'Fragrant and delicate, symbolizes bliss.', 22000),
(30, 'Viola', 'Small and cheerful, symbolizes faithfulness.', 18000),
(31, 'Amaryllis', 'Striking blooms, symbolizes determination.', 40000),
(32, 'Begonia', 'Colorful and versatile, symbolizes gratitude.', 12000),
(33, 'Calla Lily', 'Elegant and trumpet-shaped, symbolizes beauty.', 30000),
(34, 'Crocus', 'Early spring bloom, symbolizes cheerfulness.', 14000),
(35, 'Gladiolus', 'Tall spikes of colorful blooms, symbolize strength.', 28000),
(36, 'Hollyhock', 'Towering spikes of flowers, attract butterflies.', 25000),
(37, 'Nasturtium', 'Edible and vibrant, symbolizes conquest.', 18000),
(38, 'Ranunculus', 'Layers of petals, symbolize radiant charm.', 28000),
(39, 'Snowdrop', 'Small white flowers, symbolize hope.', 15000),
(40, 'Anemone', 'Delicate and dainty, symbolizes anticipation.', 22000),
(41, 'Bleeding Heart', 'Heart-shaped blooms, symbolize love.', 20000),
(42, 'Columbine', 'Unique spurred flowers, attract hummingbirds.', 22000),
(43, 'Cosmos', 'Graceful and daisy-like, symbolizes order.', 15000),
(44, 'Delphinium', 'Tall spikes of colorful flowers, symbolize boldness.', 28000),
(45, 'Freesia', 'Fragrant and funnel-shaped blooms.', 25000),
(46, 'Heather', 'Small and bell-shaped, symbolizes admiration.', 18000),
(47, 'Iceland Poppy', 'Papery blooms in various colors.', 20000),
(48, 'Lilac', 'Fragrant, symbolizes youthful innocence.', 30000),
(49, 'Morning Glory', 'Vibrant and trumpet-shaped, symbolizes love.', 15000),
(50, 'Oxalis', 'Shamrock-shaped leaves, symbolize luck.', 12000),
(51, 'Primrose', 'Colorful and low-growing, symbolizes youth.', 18000),
(52, 'Statice', 'Papery blooms, symbolize success.', 15000),
(53, 'Tansy', 'Yellow button-like flowers, symbolize health.', 14000),
(54, 'Yarrow', 'Clusters of tiny flowers, symbolize healing.', 18000),
(55, 'Aconitum', 'Tall spikes of hooded blooms, symbolize ambition.', 25000),
(56, 'Alstroemeria', 'Colorful and striped, symbolize friendship.', 20000),
(57, 'Aster', 'Dainty and star-shaped, symbolize patience.', 15000),
(58, 'Borage', 'Edible blue flowers, symbolize courage.', 12000),
(59, 'Chamomile', 'Small and daisy-like, symbolizes relaxation.', 18000),
(60, 'Dianthus', 'Fragrant and compact, symbolizes passion.', 15000),
(61, 'Gazania', 'Colorful and drought-resistant.', 18000),
(62, 'Goldenrod', 'Bright yellow blooms, symbolize encouragement.', 14000),
(63, 'Heliotrope', 'Fragrant, small purple blooms.', 25000),
(64, 'Impatiens', 'Shade-loving, colorful blooms.', 15000),
(65, 'Kangaroo Paw', 'Unique, tubular blooms resembling a kangaroo paw.', 22000),
(66, 'Larkspur', 'Tall spikes of colorful blooms, symbolize levity.', 28000),
(67, 'Moonflower', 'Fragrant, night-blooming vines.', 25000),
(68, 'Oleander', 'Evergreen shrub with toxic but attractive blooms.', 30000),
(69, 'Petunia', 'Popular and versatile, symbolizes comfort.', 15000),
(70, 'Ranunculus', 'Layers of petals, symbolize radiant charm.', 28000),
(71, 'Sage', 'Aromatic herb, symbolizes wisdom.', 18000),
(72, 'Spirea', 'Clusters of small, cascading blooms.', 20000),
(73, 'Tiger Lily', 'Striking orange blooms with dark spots.', 22000),
(74, 'Umbrella Plant', 'Unique, umbrella-like blooms.', 18000),
(75, 'Vinca', 'Low-maintenance and colorful ground cover.', 15000),
(76, 'Wisteria', 'Cascading clusters of violet blooms.', 30000),
(77, 'Yellow Archangel', 'Yellow blooms on trailing stems.', 20000),
(78, 'Zantedeschia', 'Elegant and trumpet-shaped, symbolizes purity.', 25000),
(79, 'Ajuga', 'Low-growing ground cover, attracts bees.', 18000),
(80, 'Amaranth', 'Colorful and tall, symbolizes immortality.', 22000),
(81, 'Blue Eyed Grass', 'Small blue flowers with grass-like foliage.', 15000),
(82, 'Babys Breath', 'Tiny white blooms, popular in arrangements.', 12000),
(83, 'Belladonna Lily', 'Fragrant and trumpet-shaped, symbolizes purity.', 30000),
(84, 'Cattleya Orchid', 'Showy and fragrant, symbolizes mature charm.', 35000),
(85, 'Celosia', 'Unique and feathery, symbolizes immortality.', 18000),
(86, 'Coral Bells', 'Colorful foliage and delicate blooms.', 20000),
(87, 'Dandelion', 'Common weed with yellow blooms.', 10000),
(88, 'Edelweiss', 'Alpine flower, symbolizes purity and courage.', 25000),
(89, 'Fuchsia', 'Pendulous and brightly colored blooms.', 15000),
(90, 'Gardenia', 'Fragrant and waxy white blooms.', 30000),
(91, 'Moonflower', 'Fragrant, night-blooming vines.', 25000),
(92, 'Oleander', 'Evergreen shrub with toxic but attractive blooms.', 22000),
(93, 'Petunia', 'Popular and versatile, symbolizes comfort.', 18000),
(94, 'Ranunculus', 'Layers of petals, symbolize radiant charm.', 35000),
(95, 'Sage', 'Aromatic herb, symbolizes wisdom.', 30000),
(96, 'Spirea', 'Clusters of small, cascading blooms.', 25000),
(97, 'Tiger Lily', 'Striking orange blooms with dark spots.', 22000),
(98, 'Umbrella Plant', 'Unique, umbrella-like blooms.', 18000),
(99, 'Vinca', 'Low-maintenance and colorful ground cover.', 14000),
(100, 'Wisteria', 'Cascading clusters of violet blooms.', 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `flowers`
--
ALTER TABLE `flowers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `flowers`
--
ALTER TABLE `flowers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
