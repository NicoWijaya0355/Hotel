<style>
.gallery_deg {
    display: flex;
    flex-wrap: wrap;
    gap: 15px; /* Jarak antar item */
}

.gallery_deg > div {
    flex: 0 0 calc(25% - 15px); /* Menetapkan lebar kolom menjadi 25% */
    max-width: calc(25% - 15px); /* Menetapkan lebar maksimum */
}

.gallery_img {
    width: 100%; /* Membuat gambar mengambil lebar penuh kolom */
    overflow: hidden; /* Memastikan tidak ada gambar yang keluar dari batas */
}

.gallery_img img {
    width: 100%; /* Membuat gambar responsif */
    height: 200px; /* Tetapkan tinggi yang diinginkan */
    object-fit: cover; /* Memastikan gambar terpotong dengan baik */
}
</style>
<div  class="gallery">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>gallery</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="gallery_deg">
                  @foreach ($gallery as $data)

                     <div class="col-md-3 ">
                        <div class="gallery_img">
                           <figure><img src="gallery/{{$data->image}}" alt="#"/></figure>
                        </div>
                     </div>
                  @endforeach
               </div>
               
            </div>
         </div>
      </div>