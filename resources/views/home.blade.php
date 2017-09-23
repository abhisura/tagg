@include('style.header')
    <div class="container">
        <form class="form-horizontal" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}
            <fieldset>
                <legend>BUSINESS REGISTRATION</legend>

                @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                @endif

                @if(session('response'))
                    <div class="col-md-8 alert alert-success">
                        {{@session('response')}}
                    </div>
                @endif

                <div class="form-group">
                    <label for="inputName" class="col-lg-2 control-label">Business Name*</label>
                    <div class="col-lg-6">
                        <input type="text" name="org_name" class="form-control" id="inputName" placeholder="Name of the Business">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress1" class="col-lg-2 control-label">Address 1*</label>
                    <div class="col-lg-6">
                        <input type="text" name="street_address1" class="form-control" id="inputAddress1" placeholder="Example: Street Name,Company Name,P.O. Box Number">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress2" class="col-lg-2 control-label">Address 2</label>
                    <div class="col-lg-6">
                        <input type="text" name="street_address2" class="form-control" id="inputAddress2" placeholder="Example: Apartment,Suite,Unit Number,Building,Floor">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputCity" class="col-lg-2 control-label">City*</label>
                    <div class="col-lg-3">
                        <input type="text" name="city" class="form-control" id="inputCity" placeholder="Name of the City">
                </div>
                </div>
                <div class="form-group">
                    <label for="inputZip" class="col-lg-2 control-label">ZipCode*</label>
                    <div class="col-lg-1">
                        <input type="text" name="zipcode" class="form-control" id="inputZip" placeholder="Zip">
                    </div>
                </div>
                <div class="form-group">
                    <label for="state" class="col-lg-2 control-label">State*</label>
                    <div class="col-lg-6">
                        <select class="form-control" name="state" id="state">
                            <option value="Select State">Select State</option>
                            <option value="AL">AL</option>
                            <option value="AK">AK</option>
                            <option value="AR">AR</option>
                            <option value="AZ">AZ</option>
                            <option value="CA">CA</option>
                            <option value="CO">CO</option>
                            <option value="CT">CT</option>
                            <option value="DC">DC</option>
                            <option value="DE">DE</option>
                            <option value="FL">FL</option>
                            <option value="GA">GA</option>
                            <option value="HI">HI</option>
                            <option value="IA">IA</option>
                            <option value="ID">ID</option>
                            <option value="IL">IL</option>
                            <option value="IN">IN</option>
                            <option value="KS">KS</option>
                            <option value="KY">KY</option>
                            <option value="LA">LA</option>
                            <option value="MA">MA</option>
                            <option value="MD">MD</option>
                            <option value="ME">ME</option>
                            <option value="MI">MI</option>
                            <option value="MN">MN</option>
                            <option value="MO">MO</option>
                            <option value="MS">MS</option>
                            <option value="MT">MT</option>
                            <option value="NC">NC</option>
                            <option value="NE">NE</option>
                            <option value="NH">NH</option>
                            <option value="NJ">NJ</option>
                            <option value="NM">NM</option>
                            <option value="NV">NV</option>
                            <option value="NY">NY</option>
                            <option value="ND">ND</option>
                            <option value="OH">OH</option>
                            <option value="OK">OK</option>
                            <option value="OR">OR</option>
                            <option value="PA">PA</option>
                            <option value="RI">RI</option>
                            <option value="SC">SC</option>
                            <option value="SD">SD</option>
                            <option value="TN">TN</option>
                            <option value="TX">TX</option>
                            <option value="UT">UT</option>
                            <option value="VT">VT</option>
                            <option value="VA">VA</option>
                            <option value="WA">WA</option>
                            <option value="WI">WI</option>
                            <option value="WV">WV</option>
                            <option value="WY">WY</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPhone" class="col-lg-2 control-label">Phone(xxx-xxx-xxxx)*</label>
                    <div class="col-lg-3">
                        <input type="tel" input pattern="^\d{3}-\d{3}-\d{4}$"" name="phone_number" class="form-control" id="inputPhone" placeholder="Phone">
                    </div>
                </div>
                        <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <h6>Fields Marked With (*) Are Mandatory</h6>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
@include('style.footer')




