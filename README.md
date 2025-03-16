# İnşaat Malzemeleri Sipariş ve Yönetim Sistemi

**İnşaat Malzemeleri Sipariş Sistemi**, inşaat sektöründeki firmaların, kullanıcıların ihtiyaçlarına göre yapı malzemelerini kolayca sipariş edebileceği bir platform sunar. Bu sistem, kullanıcı dostu arayüzüyle malzeme siparişlerini hızlı ve güvenli bir şekilde yönetmeye olanak tanır.

## Proje Özeti

Bu proje, bir inşaat firmasının mevcut malzeme envanterini ve sipariş süreçlerini dijital ortamda yönetebilmesini sağlayan bir platform sunar. Kullanıcılar, sisteme kayıt olduktan sonra malzeme listelerini görüntüleyebilir, sipariş verebilir ve geçmiş siparişlerini yönetebilir. Ayrıca sistem, her kullanıcıya özel siparişlerini düzenleme ve silme yetkisi tanır.

### Ana Sayfa Özellikleri

- **Kullanıcı Girişi ve Kayıt:** Sisteme giriş yaparak veya yeni bir kullanıcı olarak kaydolarak anasayfaya erişebilirsiniz.  
- **Ürünler ve Fiyatlar:** Ana sayfada, firma açıklamalarıyla birlikte mevcut yapı malzemelerinin fiyatları görüntülenebilir.  
- **Sipariş Formu:** Malzeme siparişi vermek için kullanıcı dostu bir form sunulmaktadır.  
- **Siparişlerim:** Kullanıcılar, bu sekmeden önceki siparişlerine ulaşabilir, siparişlerini düzenleyebilir veya silebilir.  
- **Çıkış Yap:** Kullanıcılar, sistemden güvenli bir şekilde çıkış yapabilir.

### Kullanıcı Arayüzü

- **GitHub Entegrasyonu:** Proje GitHub ile entegre olup, kodların erişilebilirliğini sağlayan bir buton içerir.  
- **Mobil Uyumluluk:** Bootstrap kullanılarak tasarlanan sayfa, farklı cihazlar için uyumlu hale getirilmiştir.

## Kullanılan Teknolojiler

- **HTML5:** Sayfanın yapısının oluşturulmasında temel yapı taşları kullanılmıştır.
- **Bootstrap:** Sayfanın modern, mobil uyumlu ve kullanıcı dostu görünmesi için Bootstrap CSS framework’ü kullanılmıştır.
- **PHP:** Dinamik işlevsellik ve sunucu tarafı işlemler için PHP dilinden yararlanılmıştır.
- **MySQL:** Veritabanı yönetimi ve veri saklama işlemleri için MySQL veritabanı kullanılmıştır.

## Proje Kurulumu

### Gereksinimler

- **XAMPP:** Apache ve MySQL servislerini çalıştırmak için XAMPP kullanmanız gerekmektedir.
- **Web Tarayıcısı:** Projeyi test etmek için herhangi bir modern web tarayıcısı (Chrome, Firefox vb.) kullanabilirsiniz.

### Kurulum Adımları

1. **XAMPP'yi İndirin:** [XAMPP İndir](https://www.apachefriends.org/download.html)
2. **Proje Dosyalarını İndirin:** Projenin PHP dosyalarını XAMPP'in `htdocs` klasörüne yükleyin. Proje dosyalarının tek bir klasörde olmasına dikkat edin.
3. **XAMPP’i Başlatın:**
   - XAMPP Control Panel’i açın.
   - Apache ve MySQL servislerini başlatın ve yeşil renkte göründüğünden emin olun.
4. **Veritabanı Oluşturun:**
   - Web tarayıcınızda [http://localhost/phpmyadmin](http://localhost/phpmyadmin) adresine gidin.
   - Yeni bir veritabanı oluşturun (örneğin, `insaat`).
   - Veritabanı içine, `insaat.sql` dosyasını içe aktarın.
5. **Proje Erişimi:**
   - Tarayıcınızda [http://localhost/giris.php](http://localhost/giris.php) adresine gidin ve giriş yapın.

## Özellikler

- **Kullanıcı Kaydı ve Girişi:** Kullanıcılar sisteme yeni kaydolabilir veya mevcut hesaplarıyla giriş yapabilir.  
- **Sipariş Yönetimi:** Kullanıcılar, malzeme siparişlerini verebilir, geçmiş siparişlerini düzenleyebilir veya silebilir.  
- **GitHub Entegrasyonu:** GitHub üzerinden projeye erişebilir ve katkı sağlayabilirsiniz.  
- **Responsive Tasarım:** Bootstrap ile tasarlanan sistem, mobil cihazlarda da rahatça kullanılabilir.  
- **Veritabanı Desteği:** MySQL ile entegre çalışan sistem, verilerin güvenli bir şekilde saklanmasını sağlar.

## Proje Videosu
Projenin tanıtım videosunu aşağıdaki bağlantıdan izleyebilirsiniz:
- [Proje Tanıtım Videosu](https://www.youtube.com/watch?v=C1Ndg_rMISs)

## Projeye Erişim

Proje erişimi için aşağıdaki linkleri kullanabilirsiniz:
- https://ilbgginsaat.000webhostapp.com/
- https://ilbgginsaat.000webhostapp.com/giris.php
Projeye erişmede problem yaşarsanız arama motorunu https://ilbgginsaat.000webhostapp.com/giris.php bunu yazıp /giris.php kısmını elle sildikten sonra tekrar deneyiniz.
Sayfaya erişirken yeniden denemeniz gerekirse ısrarla yeniden dene sekmesine tıklarsanız da site görünür olabilir.

