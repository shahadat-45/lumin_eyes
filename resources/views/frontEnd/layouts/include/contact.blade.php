<div id="contact" class="contact pb-5">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>Contact us</h2>
                <span>There are many variations of passages of Lorem Ipsum available, but the </span>
             </div>
          </div>
       </div>
    </div>
    <div class="container">
        <div class="row">
           <div class="col-md-12">
              <div class="row">
                 <div class="col-md-11 mx-auto">
                    @if(session('success'))
                          <div class="alert alert-success">
                             {{ session('success') }}
                          </div>
                    @endif
                 </div>
              </div>
  
              <form class="main_form" method="POST" action="{{ route('contact.save') }}">
                    @csrf
                    <div class="row">
                       <div class="col-md-12">
                          <input 
                                class="form_contril {{ $errors->has('name') ? 'error-input' : '' }}" 
                                placeholder="{{ $errors->has('name') ? $errors->first('name') : 'name' }}" 
                                type="text" 
                                name="name" 
                                value="{{ old('name') }}">
                       </div>
                       <div class="col-md-12">
                          <input 
                                class="form_contril {{ $errors->has('phone') ? 'error-input' : '' }}" 
                                placeholder="{{ $errors->has('phone') ? $errors->first('phone') : 'Phone Number' }}" 
                                type="text" 
                                name="phone" 
                                value="{{ old('phone') }}">
                       </div>
                       <div class="col-md-12">
                          <input 
                                class="form_contril {{ $errors->has('email') ? 'error-input' : '' }}" 
                                placeholder="{{ $errors->has('email') ? $errors->first('email') : 'Email' }}" 
                                type="text" 
                                name="email" 
                                value="{{ old('email') }}">
                       </div>
                       <div class="col-md-12">
                          <textarea 
                                class="textarea {{ $errors->has('message') ? 'error-input' : '' }}" 
                                placeholder="{{ $errors->has('message') ? $errors->first('message') : 'Message' }}" 
                                name="message">{{ old('message') }}</textarea>
                       </div>
                       <div class="col-sm-12">
                          <button class="send_btn" type="submit">Send</button>
                       </div>
                    </div>
              </form>
           </div>
        </div>
     </div>
 </div>