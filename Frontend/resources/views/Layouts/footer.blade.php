<footer class="site-footer" id="contactUs">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6">
          <div class="footer-form">
            <h5>اتصل بنا</h5>
            <form method="post" action="{{ URL::to('/contactUs') }}">
              @csrf
              <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                  <div class="form-group">
                    <input type="text" name="name" id="" class="form-control" placeholder="الاسم:">
                  </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                  <div class="form-group">
                    <input type="text" name="phone" id="" class="form-control" placeholder="رقم الجوال:">
                  </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                  <div class="form-group">
                    <input type="email" name="email" id="" class="form-control" placeholder="البريد الالكتروني:">
                  </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                  <div class="form-group">
                    <input type="text" name="address" id="" class="form-control" placeholder="عنوان الرساالة:">
                  </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                  <div class="form-group">
                    <textarea name="message" class="form-control" placeholder="تفاصيل الرسالة"></textarea>
                  </div>
                </div>
              </div>
              <button type="submit">ارسل رسالتك</button>
            </form>
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6">
          <div class="footer-logo">
            <img src="{{ asset('/assets/images/form-logo.png') }}" alt="">
          </div>
          <div class="social">
            @php 
            $mobile = App\Models\Variable::getVar('رقم الواتس اب:');
            @endphp
            <a href="{{ \App\Models\Variable::getVar('رابط تويتر:') }}"><i class="flaticon-twitter"></i></a>
            <a href="{{ \App\Models\Variable::getVar('رابط يوتيوب:') }}"><i class="flaticon-youtube"></i></a>
            <a href="{{ \App\Models\Variable::getVar('رابط انستجرام:') }}"><i class="flaticon-instagram"></i></a>
          </div>
        </div>
      </div>
      <div class="copy">
        <div class="copy-whats">
          <a href="https://api.whatsapp.com/send?phone={{ $mobile }}&text=مرحبا" title=""><img src="{{ asset('/assets/images/whatsapp.png') }}" alt=""></a>
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-6 col-lg-6">
            <h5>جميع الحقوق محفوظة لـ جمعية الفنانين السعوديين</h5>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="company-logo">
              <img src="{{ asset('/assets/images/company.png') }}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
</footer>