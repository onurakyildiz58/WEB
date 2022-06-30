ilk önce db tasarlanır
db eklem kısmı:
	Models sağ tık ekle yeni item sonra çıkan pencereden veriyi 
	seçiyoruz ADO.NET entity DAta modeli seçip isim veriyouz
	yeni bağlantı kısmında server adımızı giriyoruz
	ilgili istenilen database seçilir
	istenilen tablolar seçilir
model eklenmesi:
	Models sağ tık class ekle diyip yeni ViewModel oluşturulur
	ana tablodaki yani eklediğimiz db deki ana tablonun .cs 
	uzantılı dosyası bağlantısı olmayan (virtual olmayan ) sutünlar 
	kopyalayıp yeni oluşturduğumuz ViewModele kopyalarız
	foreign key varsa o String olarak eklenilir
css tasarım:
	controllerde home controller a girip içinde sağ tık go to view e tıklarız cshtml dosyası açılır
	tasarım yapılır Scripts dosyasından gerekli script ve contentten gerekli bootstrap dosyaları eklenir
	home controller da çalışacağımız için html dosyaınında açtığımız script taglerinde 
	ajax kullanırken url kısımlarını url = "/Home/fonkadı", şeklinde yapmalıyız eğerki bi veri varsa sayfada yani 
	kayıt güncellenicekse ya da silinicekse şu şekilde yapılır "/Home/fonkadı?sutünadı="+inputtakideğer, şeklinde yapılır
	public JsonResult fonkadı(value){} şeklinde yapılır.select işlemi şu şekilde yapılır öncesinde Model.Context.cs
	dosyasından MVC ile başlayan komutu alıyoruz kopyalayarak 
	tabloadı value = db.tabloadıs.Where(x=>x.sutünadı == koşul)
	(evet sonunda cidden s var geliba çoğul yapmak gbii bişi düşünmüşler tablolar ayağı hani)

	