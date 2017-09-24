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
                          <option value="AL">Alabama</option>
    <option value="AK">Alaska</option>
    <option value="AZ">Arizona</option>
    <option value="AR">Arkansas</option>
    <option value="CA">California</option>
    <option value="CO">Colorado</option>
    <option value="CT">Connecticut</option>
    <option value="DE">Delaware</option>
    <option value="DC">District Of Columbia</option>
    <option value="FL">Florida</option>
    <option value="GA">Georgia</option>
    <option value="HI">Hawaii</option>
    <option value="ID">Idaho</option>
    <option value="IL">Illinois</option>
    <option value="IN">Indiana</option>
    <option value="IA">Iowa</option>
    <option value="KS">Kansas</option>
    <option value="KY">Kentucky</option>
    <option value="LA">Louisiana</option>
    <option value="ME">Maine</option>
    <option value="MD">Maryland</option>
    <option value="MA">Massachusetts</option>
    <option value="MI">Michigan</option>
    <option value="MN">Minnesota</option>
    <option value="MS">Mississippi</option>
    <option value="MO">Missouri</option>
    <option value="MT">Montana</option>
    <option value="NE">Nebraska</option>
    <option value="NV">Nevada</option>
    <option value="NH">New Hampshire</option>
    <option value="NJ">New Jersey</option>
    <option value="NM">New Mexico</option>
    <option value="NY">New York</option>
    <option value="NC">North Carolina</option>
    <option value="ND">North Dakota</option>
    <option value="OH">Ohio</option>
    <option value="OK">Oklahoma</option>
    <option value="OR">Oregon</option>
    <option value="PA">Pennsylvania</option>
    <option value="RI">Rhode Island</option>
    <option value="SC">South Carolina</option>
    <option value="SD">South Dakota</option>
    <option value="TN">Tennessee</option>
    <option value="TX">Texas</option>
    <option value="UT">Utah</option>
    <option value="VT">Vermont</option>
    <option value="VA">Virginia</option>
    <option value="WA">Washington</option>
    <option value="WV">West Virginia</option>
    <option value="WI">Wisconsin</option>
    <option value="WY">Wyoming</option>
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




