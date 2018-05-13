## Döviz Kuru Karşılaştırıcı
Tanımlı olan iki provider'dan çektiği USD, EURO ve GBP döviz kuru bilgilerini veritabanına yazan ve en düşüklerini ekranda listeleyen uygulamadır. Yeni provider eklenmesi gerektiğinde sadece Adapter sınıfının eklenerek verilere erişilebilmesi hedeflenmiştir.

- Tüm kodlamalar `ExchangeRateBundle` altında yapılmıştır.
- `Service` klasörü içerisinde API'ye bağlantı ve cevabın parçalandığı sınıflar vardır. Yeni provider eklemek için `RateAdapterInterface` implemente edilmelidir. Web servisin URL'i `parameters.yml` dosyasına eklenmelidir.
- `sync:exchange-rates` komutu oluşturulmuştur, bu komut provider'ları gezdikten sonra kur bilgilerini veritabanına yazmaktadır. Yeni provider'dan bilgi çekilmesi için bu komut içerisine dahil edilmelidir.
- En düşük kurları anasayfada listeleyebilmek için `RateRepository` içerisine `getMinimum` isimli fonksiyon eklenmiştir.
- `Utils` klasörü altına ise yardımcı sınıflar eklenmiştir.
- HTTP istekleri için `Guzzle` kullanılmıştır.
- Unit testleri yazılmıştır.