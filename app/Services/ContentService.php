<?php

namespace App\Services;

class ContentService
{
    private static function getYouTubeVideoId(?string $url): ?string
    {
        if (!$url) return null;
        $pattern = '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i';
        if (preg_match($pattern, $url, $match)) {
            return $match[1];
        }
        return null;
    }

    private static function getYouTubeThumbnailUrl(?string $url, string $quality = 'hqdefault'): string
    {
        $videoId = self::getYouTubeVideoId($url);
        if ($videoId) {
            return "https://img.youtube.com/vi/{$videoId}/{$quality}.jpg";
        }
        return '';
    }

    public static function getNews()
    {
        return [
            [
                'id' => 1,
                'title' => 'Kenali 5 Tanda Awal Kanker Otak yang Tak Disadari',
                'description' => 'Tumor otak dibagi menjadi dua jenis, yaitu tumor otak primer dan sekunder. Tumor otak primer adalah jenis tumor otak yang muncul pertama kali di otak. Sedangkan tumor otak sekunder, adalah tumor otak yang awalnya berasal dari kanker yang menyebar dari anggota tubuh lain ke otak.',
                'image' => 'https://akcdn.detik.net.id/community/media/visual/2016/05/09/fd0beb3d-ba58-4768-8345-c72bfcf65b6c_169.jpg?w=700&q=90',
                'date' => '2025-07-17',
                'category' => 'Klinis',
                'author' => 'Ryan Boby Aditya Purnomo',
                'content' => "Tumor otak dibagi menjadi dua jenis, yaitu tumor otak primer dan sekunder. Tumor otak primer adalah jenis tumor otak yang muncul pertama kali di otak. Sedangkan tumor otak sekunder, adalah tumor otak yang awalnya berasal dari kanker yang menyebar dari anggota tubuh lain ke otak.\nDikutip dari Cancer org, ada sekitar 40 jenis utama tumor otak yang pernah ditemukan. Seluruhnya dibagi menjadi dua kategori lagi, yaitu tumor jinak dan ganas.\n\nTumor jinak tumbuh lambat dan kecil kemungkinan menyebar. Sedangkan, tumor otak ganas inilah yang bersifat kanker, dan bisa menyebar ke bagian lain di bagian otak atau sumsum tulang belakang.\n\nBeberapa jenis tumor otak ganas yang paling umum adalah glioblastoma dan meningioma (juga bisa bersifat non-kanker).\n\nGlioblastoma adalah tumor otak ganas yang tumbuh sangat cepat dan agresif, berasal dari sel glial di otak. Sedangkan, meningioma merupakan tumor yang tumbuh dari selaput pelindung otak dan sumsum tulang belakang.\nTanda Awal Kanker Otak\nDikutip dari Mayo Clinic, kemunculan tumor ganas atau kanker otak tergantung pada ukuran dan lokasinya. Gejala juga bisa tergantung dari seberapa cepat tumbuh, yang juga disebut dengan tingkat keganasan tumor.\n\nBerikut ini beberapa gejala yang mungkin muncul:\n\n1. Sakit Kepala\nSakit kepala adalah gejala kanker otak yang paling umum terjadi. Rasa nyeri di kepala terjadi ketika tumor yang tumbuh menekan sel-sel sehat di sekitarnya. Rasa nyeri juga bisa disebabkan oleh tumor yang memicu pembengkakan otak.\n\nSakit kepala yang disebabkan oleh kanker otak biasanya sangat menyakitkan dan cenderung terjadi di pagi hari. Sakit kepala akibat kanker juga cenderung memburuk saat batuk atau mengejan.\n\n2. Mual atau Muntah\nPerasaan mual muncul akibat tumor ganas yang tumbuh dalam otak, menekan jaringan atau menghalangi cairan di dalam otak. Keduanya dapat meningkatkan tekanan dalam tengkorak yang disebut intracranial pressure (ICP).\n\nEfek yang muncul meliputi mual, muntah, dan sakit kepala.\n\n3. Masalah Penglihatan\nPosisi tumor ganas di otak memengaruhi gejala yang mungkin muncul. Pada masalah penglihatan, kondisi ini terjadi akibat tumor berada di area otak yang berhubungan dengan penglihatan atau gerakan mata.\n\nKondisi ini akhirnya memicu penglihatan ganda, yang pada akhirnya juga memperparah gejala mual.\n\n4. Kehilangan Rasa atau Gerakan pada Kaki\nOtak memainkan peranan penting dalam memberikan sensasi rasa sentuhan di seluruh tubuh. Ketika tumor ganas muncul, biasanya akan muncul gejala seperti rasa kaku dan kesemutan di area kaki.\n\nGejala ini mungkin juga dapat muncul di area wajah dan tangan.\n\n5. Mudah Lelah\nTumor ganas berdampak besar pada fungsi neurologis yang juga berkontribusi pada masalah kelelahan parah. Tumor yang berada di area tertentu dapat mengganggu neurotransmitter (senyawa kimia pembawa sinyal antar sel saraf) dan merusak jaringan saraf yang terlibat dalam pengaturan tingkat energi, suasana hati, dan fungsi kognitif.\n\nDibandingkan tumor jinak, tumor otak yang bersifat ganas, menyebabkan gejala yang memburuk lebih cepat. Biasanya gejala tumor ganas muncul secara tiba-tiba dan memburuk dalam hitungan pekan atau bahkan hari."
            ],
            [
                'id' => 2,
                'title' => 'Cerita Pasien Gagal Ginjal Alami Gejala Gatal-gatal, Begini yang Dirasakan',
                'description' => 'Penyakit ginjal memiliki beberapa gejala, beberapa di antaranya lebih mengganggu daripada yang lain. Merasa lelah atau lebih lemah dari biasanya sangat umum, tetapi pada tahap awal penyakit ginjal, pasien mungkin tidak mengalami gejala sama sekali.',
                'image' => 'https://akcdn.detik.net.id/community/media/visual/2024/07/22/ilustrasi-penyakit-ginjal_169.jpeg?w=700&q=90',
                'date' => '2025-07-17',
                'category' => 'Klinis',
                'author' => 'Ryan Boby Aditya Purnomo',
                'content' => "Penyakit ginjal memiliki beberapa gejala, beberapa di antaranya lebih mengganggu daripada yang lain. Merasa lelah atau lebih lemah dari biasanya sangat umum, tetapi pada tahap awal penyakit ginjal, pasien mungkin tidak mengalami gejala sama sekali.\nKelelahan dan rasa lemah memang mengganggu, tetapi salah satu gejala yang paling mengganggu adalah rasa gatal.\n\nDikutip dari National Kidney Foundation, gatal pada penyakit ginjal terkadang disebut sebagai pruritus uremik atau pruritus terkait penyakit ginjal kronis (PGK). Penumpukan urea dalam darah menyebabkan rasa gatal, yang terjadi ketika kedua ginjal berhenti bekerja.\n\nPasien penyakit ginjal stadium akhir kemungkinan besar mengalami kulit yang sangat gatal, tetapi rasa gatal ini juga dapat terjadi pada mereka yang berada pada tahap awal. Sensasi ini dapat terjadi kapan saja dan berkisar dari ringan hingga tak tertahankan.\n\nRasanya seperti tertusuk jarum di dalam kulit saya. Terkadang dimulai dengan sentuhan fisik ringan dan semakin parah. Saya menggaruk sedikit dan rasa gelinya semakin kuat. Kemudian saya menggaruk lebih keras dan rasa gatalnya tak kunjung hilang, kata Jen, salah satu pasien gagal ginjal kronis."
            ],
            [
                'id' => 3,
                'title' => 'Tak Terasa Tapi Bahaya, Kenali Penyebab Diabetes Sebelum Terlambat',
                'description' => 'Gaya hidup cepat dan konsumsi gula tinggi yang umum di kota Jakarta kian meningkatkan risiko penyakit gula atau diabetes melitus, yang terjadi saat kadar gula darah tinggi akibat gangguan pada insulin (hormon pengatur gula darah).',
                'image' => 'https://akcdn.detik.net.id/community/media/visual/2020/11/05/ilustrasi-diabetes-2_169.jpeg?w=700&q=90',
                'date' => '2025-07-16',
                'category' => 'Edukasi',
                'author' => 'Ryan Boby Aditya Purnomo',
                'content' => "Gaya hidup cepat dan konsumsi gula tinggi yang umum di kota Jakarta kian meningkatkan risiko penyakit gula atau diabetes melitus, yang terjadi saat kadar gula darah tinggi akibat gangguan pada insulin (hormon pengatur gula darah). Penting untuk memahami penyebabnya dan melakukan deteksi dini agar bisa dicegah sejak awal karena gejala diabetes sering muncul tanpa disadari.\nDokter Spesialis Penyakit Dalam Konsultan Endokrin, Metabolik, dan Diabetes di Mayapada Hospital Jakarta Selatan, dr. Herry Nursetiyanto, Sp.PD-KEMD, FINASIM, mengatakan banyak orang tidak menyadari bahwa mereka sudah berada dalam tahap pradiabetes atau bahkan diabetes.\nFase awal itu prediabetes, di mana kadar gula darah puasa sudah di atas normal tetapi belum dikatakan diabetes. Tentu, ada risiko berkembang menjadi diabetes tipe 2. Seseorang dikatakan prediabetes jika hasil HbA1c (rata-rata gula darah 3 bulan terakhir) berada di antara 5,7% hingga 6,4%, atau gula darah puasa (GDP) berkisar 100-125 mg/dL. Kemudian bisa berlanjut ke fase diabetes bila HbA1c ≥ 6,5% atau GDP ≥ 126 mg/dL, jelas Dokter Herry dalam keterangan tertulis, Kamis (17/7/2025)."
            ],
            [
                'id' => 4,
                'title' => '5 Ciri TBC yang Beda dari Flu Biasa, Jangan Sampai Salah Obat',
                'description' => 'Tuberkulosis atau TBC merupakan penyakit menular yang disebabkan oleh bakteri Mycobacterium tuberculosis. Infeksi TBC sebenarnya bisa menyerang banyak organ, seperti otak, tulang belakang, dan getah bening.',
                'image' => 'https://akcdn.detik.net.id/community/media/visual/2022/03/22/ilustrasi-tuberkulosis_169.jpeg?w=700&q=90',
                'date' => '2025-07-15',
                'category' => 'Edukasi',
                'author' => 'Ryan Boby Aditya Purnomo',
                'content' => "Tuberkulosis atau TBC merupakan penyakit menular yang disebabkan oleh bakteri Mycobacterium tuberculosis. Infeksi TBC sebenarnya bisa menyerang banyak organ, seperti otak, tulang belakang, dan getah bening. Namun, kasus yang paling banyak ditemukan menginfeksi paru-paru.\nDikutip dari laman Kementerian Kesehatan (Kemenkes) RI, TBC dapat menyebar melalui udara ketika orang yang terinfeksi batuk atau bersin, tanpa menutup mulut. Ini membuat bakteri penyebab TBC menyebar dan bisa berpindah ke orang lain.\n\nCiri TBC yang Beda dari Flu Biasa\nPengobatan TBC bisa berlangsung sangat lama. Penting untuk mengetahui ciri-ciri TBC agar penanganan bisa dilakukan secara efektif dan lebih dini.\n\nSeringkali, gejala yang ditimbulkan TBC disalahartikan sebagai flu biasa atau common flu. Ini dikarenakan adanya kemiripan beberapa gejala seperti batuk dan demam yang muncul. Berikut ini beberapa ciri-ciri yang berbeda dari TBC dan kondisi flu biasa:\n\n1. Batuk Durasi Lama dan Berdarah\nBatuk akibat TBC biasanya akan berlangsung sangat lama. Bila gejala batuk terjadi lebih dari dua minggu, ada baiknya pemeriksaan segera dilakukan. Ini untuk memastikan apakah gejala batuk yang dialami berkaitan dengan TBC atau tidak.\n\n\"Kalau dia batuk lebih dari 2 minggu dia harus periksakan ke tenaga kesehatan. Batuk dua minggu, lalu berdahak. Kemudian kalau ada batuk darah itu cepat untuk dicurigai sebagai TB, jadi harus diperiksakan secara lebih lanjut,\" kata spesialis paru dr Erlang Samoedro, SpP(K) dalam sebuah wawancara.\n\nSedangkan untuk batuk akibat flu biasanya muncul secara tiba-tiba, cenderung parah, dan tidak memunculkan darah. Batuk akibat flu biasanya juga lebih cepat untuk sembuh.\n\n2. Keringat Malam\nGejala TBC biasa disertai demam ringan dan keringat di malam hari. Meski kondisinya dingin, tubuh tetap mengeluarkan keringat.\n\nKeringat yang keluar merupakan respons imun tubuh yang berusaha melawan infeksi TBC. Proses ini meningkatkan suhu tubuh dan memicu keringat di malam hari.\n\nSedangkan, untuk flu biasa biasanya demam cenderung lebih tinggi dan cepat mereda. Kondisi flu biasa juga jarang disertai keringat malam.\n\n3. Penurunan Berat Badan\nPengidap TBC biasanya juga mengalami penurunan berat badan tidak wajar. Berat badan tetap turun meski tidak sedang menjalani diet penurunan berat badan tertentu. Kondisi ini biasanya disertai penurunan nafsu makan dan nyeri dada."
            ],
        ];
    }

    public static function getMedia()
    {
        $mediaData = [

[
        'id' => 1,
        'title' => 'Penanganan Hiperglikemia Pada Pasien Diabetes',
        'description' => 'Video panduan klinis yang membahas hubungan antara hiperglikemia dan diabetes melitus. Pelajari gejala, penyebab, dan intervensi kunci untuk stabilisasi pasien.',
        'type' => 'video',
        'date' => '2025-07-18',
        'content' => "Video ini menjelaskan secara rinci tentang hiperglikemia, atau kadar gula darah tinggi, yang sering dikaitkan dengan diabetes. Poin-poin utama meliputi:\n\n- **Jenis Diabetes:** Penjelasan mengenai Diabetes Tipe 1, Tipe 2, dan Gestasional.\n- **Definisi Hiperglikemia:** Kondisi kadar gula darah di atas 200 mg/dL.\n- **Gejala:** Tanda-tanda umum seperti sering buang air kecil (poliuria), rasa haus berlebih (polidipsia), kelelahan, dan pandangan kabur.\n- **Komplikasi:** Risiko terjadinya Ketoasidosis Diabetik (KAD) jika tidak ditangani, suatu kondisi darurat medis.\n- **Manajemen:** Pentingnya pemeriksaan gula darah secara rutin untuk pencegahan dan penanganan dini.",
        'video_source' => 'youtube',
        'video_url' => 'https://youtu.be/OY4HyU4VVy4',
    ],
    
    [
        'id' => 2,
        'title' => 'Hiperglikemia: Gejala, Dampak, dan Cara Mengatasinya',
        'description' => 'Infografis ringkas yang merangkum semua hal penting tentang hiperglikemia. Alat bantu visual yang ideal untuk edukasi pasien atau sebagai referensi cepat bagi tenaga kesehatan.',
        'image' => 'https://ayosehat.kemkes.go.id/imagex/content/24afb05bhiperglikemia.png',
        'type' => 'image',
        'date' => '2025-07-17',
        'content' => "Infografis ini memecah konsep kompleks hiperglikemia menjadi tiga bagian yang mudah dipahami:\n\n1.  **Gejala Kunci:** Visualisasi dari Trias P (Poliuria, Polidipsia, Polifagia) serta tanda lain seperti penglihatan kabur dan kelelahan.\n2.  **Dampak Jangka Panjang:** Ilustrasi mengenai risiko kerusakan organ target seperti mata (retinopati), ginjal (nefropati), dan saraf (neuropati) jika tidak tertangani.\n3.  **Pilar Penanganan:** Rangkuman strategi manajemen meliputi pengaturan diet, aktivitas fisik, kepatuhan obat, dan monitoring mandiri."
    ],
 [
        'id' => 3,
        'title' => 'Cara Melakukan Perawatan Kaki Dengan Penyakit Diabetes Melitus',
        'description' => 'Pelajari teknik perawatan kaki diabetik untuk mencegah komplikasi serius. Video ini menyajikan panduan lengkap, dari inspeksi harian hingga pemilihan alas kaki yang tepat.',
        'type' => 'video',
        'date' => '2025-07-16',
        'content' => "Video ini mendemonstrasikan langkah-langkah penting dalam perawatan kaki untuk penderita diabetes. Topik yang dibahas meliputi:\n\n- **Inspeksi Kaki Harian:** Cara memeriksa adanya luka, lecet, atau kemerahan.\n- **Kebersihan Kaki:** Teknik mencuci dan mengeringkan kaki yang benar, termasuk area sela jari.\n- **Perawatan Kuku:** Cara memotong kuku dengan aman untuk menghindari luka.\n- **Alas Kaki:** Pentingnya menggunakan kaos kaki katun dan sepatu yang nyaman, serta larangan berjalan tanpa alas kaki.\n- **Senam Kaki:** Latihan sederhana untuk meningkatkan sirkulasi darah.",
        'video_source' => 'youtube',
        'video_url' => 'https://youtu.be/0DcaauvC4a8?si=ZhIgJUpSB-xoOXQA',
    ],
    [
        'id' => 4,
        'title' => 'Terjadi pada Penderita Diabetes Melitus, Hiperglikemia Adalah?',
        'description' => 'Pahami konsep dasar hiperglikemia melalui panduan visual ini. Menjelaskan definisi, penyebab utama, dan perbedaan antara kadar gula darah normal dengan tinggi secara jelas.',
        'image' => 'https://prodiaohi.stakcdn.com/app/assets/2023/10/01105628/Mengenal-Diabetes-Melitus-tipe-2.webp',
        'type' => 'image',
        'date' => '2025-07-15',
        'content' => "Infografis edukatif ini dirancang untuk memberikan pemahaman mendasar tentang hiperglikemia. Konten visual mencakup:\n\n- **Definisi:** Penjelasan sederhana mengenai apa itu hiperglikemia (kadar gula darah tinggi).\n- **Penyebab:** Faktor-faktor pemicu utama, termasuk kurangnya insulin, resistensi insulin, diet tidak terkontrol, stres, dan infeksi.\n- **Ambang Batas:** Grafik perbandingan kadar gula darah normal, prediabetes, dan diabetes untuk membantu identifikasi dini."
    ],
    [
 'id' => 5,
        'title' => 'CARA PENGECEKAN KAKI DIABETES DENGAN TES MONOFILAMEN',
        'description' => 'Panduan teknis untuk tenaga kesehatan dalam melakukan skrining neuropati diabetik menggunakan tes monofilamen, sebuah prosedur diagnostik vital untuk deteksi dini kerusakan saraf.',
        'type' => 'video',
        'date' => '2025-07-14',
        'content' => "Video ini adalah panduan lengkap untuk melakukan tes monofilamen pada pasien diabetes. Anda akan mempelajari:\n\n- **Tujuan Tes:** Untuk mendeteksi hilangnya sensasi pelindung pada kaki akibat neuropati perifer.\n- **Persiapan:** Cara mempersiapkan pasien dan mendemonstrasikan sensasi monofilamen sebelum tes dimulai.\n- **Prosedur:** Teknik penekanan yang benar pada 4 titik utama telapak kaki hingga monofilamen menekuk.\n- **Interpretasi:** Cara menginterpretasikan hasil untuk menentukan risiko ringan, sedang, hingga berat.\n- **Pencegahan:** Menekankan pentingnya inspeksi kaki harian dan penggunaan alas kaki yang nyaman.",
        'video_source' => 'youtube',
        'video_url' => 'https://youtu.be/P8yqmx9HHI8?si=6G2aGhW2YPiA0Ez7',
    ],
    [
        'id' => 6,
        'title' => 'Panduan dan Pola Hidup Sehat Bagi Penderita Diabetes',
        'description' => 'Sebuah infografis komprehensif yang menyajikan pilar-pilar gaya hidup sehat untuk penderita diabetes. Sangat berguna untuk materi konseling dan edukasi pasien.',
        'image' => 'https://www.mitrakeluarga.com/_next/image?url=https%3A%2F%2Fd3uhejzrzvtlac.cloudfront.net%2Fcompro%2FarticleDesktop%2F2e3be5e5-8292-465e-9072-bf23f8b4b258.webp&w=1920&q=100',
        'type' => 'image',
        'date' => '2025-07-13',
        'content' => "Infografis ini merangkum 4 pilar utama manajemen gaya hidup diabetes:\n\n1.  **Edukasi:** Memahami penyakit dan pentingnya perawatan diri.\n2.  **Pengaturan Makan (Diet):** Panduan visual tentang prinsip 3J (Jadwal, Jumlah, Jenis) dan contoh piring makan sehat.\n3.  **Latihan Jasmani:** Rekomendasi jenis dan durasi olahraga yang aman dan efektif.\n4.  **Terapi Farmakologis:** Menekankan pentingnya kepatuhan dalam mengonsumsi obat-obatan sesuai anjuran dokter."
    ],
    [
        'id' => 7,
        'title' => 'Gula Darah 300 Tapi Tidak Ada Gejala? Waspada Ini yang Bisa Terjadi!',
        'description' => 'Video ini membahas fenomena berbahaya dari hiperglikemia asimtomatik (gula darah tinggi tanpa gejala). Mengapa ini bisa terjadi dan apa saja risiko komplikasi jangka panjang yang mengintai?',
        'type' => 'video',
        'date' => '2025-07-12',
        'content' => "Banyak orang mengira kadar gula darah tinggi selalu menimbulkan gejala. Video ini meluruskan miskonsepsi tersebut dan menjelaskan:\n\n- **Silent Hyperglycemia:** Kondisi di mana tubuh beradaptasi dengan kadar gula tinggi sehingga tidak menimbulkan keluhan.\n- **Fenomena Gunung Es:** Kerusakan organ seperti ginjal, jantung, dan saraf terjadi secara senyap di dalam tubuh.\n- **Tanda Peringatan Halus:** Gejala ringan yang sering diabaikan seperti mudah mengantuk setelah makan, kulit kering, dan luka yang lama sembuh.\n- **Tindakan Pencegahan:** Pentingnya melakukan pemeriksaan HbA1c dan glukosa darah rutin meskipun tidak merasakan gejala apa pun.",
        'video_source' => 'youtube',
        'video_url' => 'https://youtu.be/uR5cQu66s5A?si=k4Tv2CgS0u9TEw2a',
    ],
     [
        'id' => 8,
        'title' => 'Metode Piring Makan Sehat untuk Diabetes',
        'description' => 'Cara mudah mengatur porsi makan harian untuk penderita diabetes menggunakan metode piring sehat. Panduan visual untuk mengontrol gula darah melalui diet seimbang.',
        'image' => 'https://d1bpj0tv6vfxyp.cloudfront.net/waspadaini8gejaladiabetesmelitushalodoc.jpg',
        'type' => 'image',
        'date' => '2025-07-11',
        'content' => "Metode Piring Sehat adalah cara sederhana dan efektif untuk mengelola porsi makan tanpa perlu menimbang makanan. Infografis ini menjelaskan cara membagi piring Anda:\n\n- **1/2 Piring:** Isi dengan sayuran non-tepung (brokoli, bayam, tomat, timun).\n- **1/4 Piring:** Isi dengan sumber protein tanpa lemak (ikan, ayam tanpa kulit, tahu, tempe).\n- **1/4 Piring:** Isi dengan karbohidrat kompleks (nasi merah, ubi, roti gandum).\n\nLengkapi dengan segelas air putih atau teh tawar untuk hidrasi yang sehat."
    ],
        ];

        return array_map(function ($item) {
            if ($item['type'] === 'video' && isset($item['video_source']) && $item['video_source'] === 'youtube') {
                $item['image'] = self::getYouTubeThumbnailUrl($item['video_url']);
            }
            return $item;
        }, $mediaData);
    }
}