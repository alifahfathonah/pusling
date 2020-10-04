function search(){
	$("#loading").show(); // Tampilkan loadingnya
	
	$.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: baseurl + "pustakawan/buat_laporan_buku/search", // Isi dengan url/path file php yang dituju
        data: {kode_buku : $("#kode_buku").val()}, // data yang akan dikirim ke file proses
        dataType: "json",
        beforeSend: function(e) {
            if(e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
		},
		success: function(response){ // Ketika proses pengiriman berhasil
            $("#loading").hide(); // Sembunyikan loadingnya
            
            if(response.status == "success"){ // Jika isi dari array status adalah success
				$("#judul").val(response.judul);
				$("#pengarang").val(response.pengarang);
				$("#penerbit").val(response.penerbit);
				$("#tempat_terbit").val(response.tempat_terbit);
				$("#klasifikasi").val(response.klasifikasi);
			}else{ // Jika isi dari array status adalah failed
				alert("Data Tidak Ditemukan");
			}
		},
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
			alert(xhr.responseText);
        }
    });
}

$(document).ready(function(){
	$("#loading").hide(); // Sembunyikan loadingnya
	
    $("#btn-search").click(function(){ // Ketika user mengklik tombol Cari
        search(); // Panggil function search
    });
    
    $("#kode_buku").keyup(function(){ // Ketika user menekan tombol di keyboard
		if(event.keyCode == 13){ // Jika user menekan tombol ENTER
			search(); // Panggil function search
		}
	});
});



// function search(){
// 	$("#loading").show();

// 	$.ajax({
// 		type: "POST",
// 		url: baseurl + "form/search",
// 		data: {kode_buku : $(#kode_buku).val()},
// 		dataType: "json",
// 		beforeSend: function(e){
// 			if(e && e.overrideMimeType){
// 				e.overrideMimeType("application/json;charset=UTF-8");
// 			}
// 		},
// 		success: function(response){
// 			$("#loading").hide();

// 			if(response.status == "success"){
// 				$("judul").val(response.judul);
// 				$("pengarang").val(response.pengarang);
// 				$("penerbit").val(response.penerbit);
// 				$("tempat_terbit").val(response.tempat_terbit);
// 				$("klasifikasi").val(response.klasifikasi);
// 			}else{
// 				alert("Data Tidak ditemukan");
// 			}
// 		},

// 			error: function (xhr, ajaxOptions, thrownError){
// 				alert(xhr.responseText);
// 			}
// 	});
// }

// $(document).ready(function(){
// 	$("#loading").hide();

// 	$("#btn-search").click(function(){
// 		search();
// 	});

// 	$("#kode_buku").keyup(function(){
// 		if(event.keyCode == 13){
// 			search();
// 		}
// 	});
// });