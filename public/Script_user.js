// Fungsi untuk menambah atau menghapus item dari wishlist
function toggleWishlist(button, programId) {
  const heartIcon = button.querySelector('i');
  const card = button.closest('.program-card');
  const title = card.querySelector('h3').innerText;

  let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];

  const isLiked = heartIcon.classList.contains('fa-solid');  // Cek apakah love sudah penuh (liked)

  if (isLiked) {
      // Hapus dari wishlist
      wishlist = wishlist.filter(item => item.id !== programId);
      heartIcon.classList.remove('fa-solid');
      heartIcon.classList.add('fa-regular');
  } else {
      // Tambahkan ke wishlist
      const programData = {
          id: programId,
          title: title,
          image: card.querySelector('img').src,
          description: card.querySelector('.program-description').innerText,
          price: card.querySelector('.program-price').innerText,
      };
      wishlist.push(programData);
      heartIcon.classList.remove('fa-regular');
      heartIcon.classList.add('fa-solid');
  }

  // Simpan wishlist ke localStorage
  localStorage.setItem('wishlist', JSON.stringify(wishlist));
  console.log("Wishlist sekarang:", wishlist);
}

// Fungsi untuk memuat wishlist dari localStorage dan merendernya ke dalam halaman
window.onload = function() {
  const wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
  const wishlistContainer = document.getElementById('wishlist-container');

  // Render wishlist items as program cards
  wishlist.forEach(item => {
      const card = document.createElement('div');
      card.classList.add('program-card');
      card.innerHTML = `
          <img src="${item.image}" alt="${item.title}" class="program-image">
          <div class="program-info">
              <p class="workout-type">Workout</p>
              <h3>${item.title}</h3>
              <p class="program-description">${item.description}</p>
              <div class="trainer-info">
                  <p>Trainer</p>
                  <p>Enrolled: 500</p>
              </div>
              <div class="program-footer">
                  <span class="program-price">${item.price}</span>
                  <button class="wishlist-btn" onclick="toggleWishlist(this, '${item.id}')" title="Remove from Wishlist">
                      <i class="fa-solid fa-heart"></i>
                  </button>
              </div>
          </div>
      `;
      wishlistContainer.appendChild(card);
  });
};

// Fungsi untuk menghapus item dari wishlist
function removeFromWishlist(programId) {
    let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];

    // Hapus course berdasarkan ID
    wishlist = wishlist.filter(item => item.id !== programId);

    // Simpan wishlist yang telah diperbarui ke localStorage
    localStorage.setItem('wishlist', JSON.stringify(wishlist));

    console.log("Wishlist sekarang setelah dihapus:", wishlist);
}

// Fungsi untuk menghapus card dari DOM
function removeCardFromDOM(button) {
    button.closest('.program-card').remove();
}

// Event listener untuk menu dropdown
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.menu-toggle').forEach(toggle => {
    toggle.addEventListener('click', function (e) {
      e.stopPropagation();

      document.querySelectorAll('.menu-container').forEach(menu => {
        if (menu !== this.parentElement) {
          menu.classList.remove('active');
        }
      });

      this.parentElement.classList.toggle('active');
    });
  });

  // Menutup menu saat klik di luar menu
  document.addEventListener('click', function () {
    document.querySelectorAll('.menu-container').forEach(menu => {
      menu.classList.remove('active');
    });
  });

  // Menghapus card course saat tombol delete diklik
  document.querySelectorAll('.delete-course').forEach(button => {
    button.addEventListener('click', function () {
      const courseCard = this.closest('.course-card');
      courseCard.remove();
    });
  });
});

function toggleWishlist(button, courseId) {
    // Menampilkan notifikasi
    const loader = button.querySelector('i'); // Ganti dengan icon loading

    // Kirim request AJAX
    fetch('/wishlist', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ course_id: courseId })
    })
    .then(response => response.json())
    .then(data => {
        // Berhasil, tampilkan notifikasi atau ubah tampilan
        alert(data.message);
    })
    .catch(error => {
        // Menampilkan error jika terjadi masalah
        alert('Terjadi kesalahan');
    });
}
