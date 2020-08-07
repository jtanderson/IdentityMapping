@extends('layouts.main')

@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endsection

@section('content')

<h1> Description</h1>
<div class="row">
  <div class="col-sm">
    Now that your map is complete, we are going to ask you some questions about those five identities. <b>Please respond to the following questions thinking about each identity one at a time.</b><br>
      <div class="row">
        <div class="col-sm">
          <br>Rate how strongly held each social identity is when you think about yourself.<br>
          <div class="slidecontainer">
           <b>
            <script>
              document.write(localStorage[1]);
            </script>
          </b>
          <form>&emsp;Strongly held &emsp;
            <label class="radio-inline">
              <input type="radio" name="optradio" value="1">&emsp;
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio" value="2">&emsp;
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio" value="3">&emsp;
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio"  value="4">&emsp;
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio" value="5">&emsp;
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio" value="6">&emsp;
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio" value="7">&emsp;
            </label>
            Weakly Held

          </form>
          <span id="demo"></span>
        </div> <div class="slidecontainer">

          <b>
            <script>
              document.write(localStorage[2]);
            </script>
          </b>
          <form>&emsp;Strongly held &emsp;
            <label class="radio-inline">
              <input type="radio" name="optradio"  value="1">&emsp;
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio" value="2">&emsp;
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio" value="3">&emsp;
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio"  value="4">&emsp;
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio" value="5">&emsp;
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio" value="6">&emsp;
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio" value="7">&emsp;
            </label>
            Weakly Held

          </form>
          <span id="demo"></span>
        </div> <div class="slidecontainer">
          <b>
            <script>
              document.write(localStorage[3]);
            </script>
          </b>
          <form>&emsp;Strongly held &emsp;
            <label class="radio-inline">
              <input type="radio" name="optradio"  value="1">&emsp;
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio" value="2">&emsp;
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio" value="3">&emsp;
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio"  value="4">&emsp;
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio" value="5">&emsp;
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio" value="6">&emsp;
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio" value="7">&emsp;
            </label>
            Weakly Held

          </form>
          <span id="demo"></span>
        </div>      

        <div class="slidecontainer">

          <b>
            <script>
              document.write(localStorage[4]);
            </script>
          </b>
          <form>&emsp;Strongly held &emsp;
            <label class="radio-inline">
              <input type="radio" name="optradio"  value="1">&emsp;
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio" value="2">&emsp;
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio" value="3">&emsp;
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio"  value="4">&emsp;
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio" value="5">&emsp;
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio" value="6">&emsp;
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio" value="7">&emsp;
            </label>
            Weakly Held

          </form>
          <span id="demo"></span>
        </div>
        <div class="slidecontainer">
          <b>
            <script>
              document.write(localStorage[5]);
            </script>
          </b>
          <form>&emsp;Strongly held &emsp;    <label class="radio-inline">
            <input type="radio" name="optradio"  value="1">&emsp;
          </label>
          <label class="radio-inline">
            <input type="radio" name="optradio" value="2">&emsp;
          </label>
          <label class="radio-inline">
            <input type="radio" name="optradio" value="3">&emsp;
          </label>
          <label class="radio-inline">
            <input type="radio" name="optradio"  value="4">&emsp;
          </label>
          <label class="radio-inline">
            <input type="radio" name="optradio" value="5">&emsp;
          </label>
          <label class="radio-inline">
            <input type="radio" name="optradio" value="6">&emsp;
          </label>
          <label class="radio-inline">
            <input type="radio" name="optradio" value="7">&emsp;
          </label>
          Weakly Held

        </form>
        <span id="demo"></span>
      </div>








      <br>Rate how important each social identity is to the way you think about yourself<br><br>
      <div class="slidecontainer">
        <b>
          <script>
            document.write(localStorage[1]);
          </script>
        </b>
        <br>&emsp; Not very important&emsp;
        <label class="radio-inline">
          <input type="radio" name="optradio"  value="1">&emsp;
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio" value="2">&emsp;
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio" value="3">&emsp;
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio"  value="4">&emsp;
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio" value="5">&emsp;
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio" value="6">&emsp;
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio" value="7">&emsp;
        </label>
        Extremely Important


      </form>
      <span id="demo"></span>
    </div>
    <div class="slidecontainer">
      <b>
        <script>
          document.write(localStorage[2]);
        </script>
      </b>
      <br>	  <form>&emsp;Not very important&emsp;
        <label class="radio-inline">
          <input type="radio" name="optradio"  value="1">&emsp;
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio" value="2">&emsp;
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio" value="3">&emsp;
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio"  value="4">&emsp;
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio" value="5">&emsp;
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio" value="6">&emsp;
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio" value="7">&emsp;
        </label>
        Extremely Important

      </form>
      <span id="demo"></span>
    </div>
    <div class="slidecontainer">
      <b>
        <script>
          document.write(localStorage[3]);
        </script>
      </b>
      &emsp;<form>&emsp; Not very important &emsp;	 
        <label class="radio-inline">
          <input type="radio" name="optradio" value="1" >&emsp;
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio" value="2">&emsp;
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio" value="3">&emsp;
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio"  value="4">&emsp;
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio" value="5">&emsp;
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio" value="6">&emsp;
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio" value="7">&emsp;
        </label>
        Extremely Important

      </form>
      <span id="demo"></span>
    </div>
    <div class="slidecontainer">
      <b>
        <script>
          document.write(localStorage[4]);
        </script>
      </b>
      <form>&emsp;Not very important &emsp;
        <label class="radio-inline">
          <input type="radio" name="optradio"  value="1">&emsp;
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio" value="2">&emsp;
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio" value="3">&emsp;
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio"  value="4">&emsp;
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio" value="5">&emsp;
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio" value="6">&emsp;
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio"  value="7">&emsp;
        </label>
        Extremely Important

      </form>
      <span id="demo"></span>
    </div>
    <div class="slidecontainer">
      <b>
        <script>
          document.write(localStorage[5]);
        </script>
      </b>
      <form>&emsp;Not Very Important &emsp;    <label class="radio-inline">
        <input type="radio" name="optradio"  value="1">&emsp;
      </label>
      <label class="radio-inline">
        <input type="radio" name="optradio" value="2">&emsp;
      </label>
      <label class="radio-inline">
        <input type="radio" name="optradio" value="3">&emsp;
      </label>
      <label class="radio-inline">
        <input type="radio" name="optradio"  value="4">&emsp;
      </label>
      <label class="radio-inline">
        <input type="radio" name="optradio" value="5">&emsp;
      </label>
      <label class="radio-inline">
        <input type="radio" name="optradio" value="6">&emsp;
      </label>
      <label class="radio-inline">
        <input type="radio" name="optradio" value="7">&emsp;
      </label>
      Extremely Important


    </form>
    <span id="demo"></span>
  </div>

  <br>Indicate the extent to which something that happens in your life is affected by what happens to other people who share that social identity.<br><br>
  <div class="slidecontainer">

    <b>
      <script>
        document.write(localStorage[1]);
      </script>
    </b>
    <br>&emsp; Very close&emsp;
    <label class="radio-inline">
      <input type="radio" name="optradio"  value="1">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="2">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="3">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio"  value="4">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="5">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="6">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="7">&emsp;
    </label>
    Not close


  </form>
  <span id="demo"></span>
</div>
<div class="slidecontainer">
  <b>
    <script>
      document.write(localStorage[2]);
    </script>
  </b>
  <br>	  <form>&emsp;Very close&emsp;
    <label class="radio-inline">
      <input type="radio" name="optradio"  value="1">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="2">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="3">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="4" >&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="5">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="6">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="7">&emsp;
    </label>
    Not close

  </form>
  <span id="demo"></span>
</div>
<div class="slidecontainer">
  <b>
    <script>
      document.write(localStorage[3]);
    </script>
  </b>
  &emsp;<form>&emsp; Very close &emsp;	 
    <label class="radio-inline">
      <input type="radio" name="optradio"  value="1">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="2">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="3">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="4" >&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="5">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="6">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="7">&emsp;
    </label>
    Not close

  </form>
  <span id="demo"></span>
</div>
<div class="slidecontainer">
  <b>
    <script>
      document.write(localStorage[4]);
    </script>
  </b>
  <form>&emsp;Very close &emsp;
    <label class="radio-inline">
      <input type="radio" name="optradio"  value="1">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="2">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="3">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio"  value="4">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="5">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="6">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="7">&emsp;
    </label>
    Not close

  </form>
  <span id="demo"></span>
</div>
<div class="slidecontainer">
  <b>
    <script>
      document.write(localStorage[5]);
    </script>
  </b>
  <form>&emsp;Very close &emsp;    <label class="radio-inline">
    <input type="radio" name="optradio" value="1">&emsp;
  </label>
  <label class="radio-inline">
    <input type="radio" name="optradio" value="2">&emsp;
  </label>
  <label class="radio-inline">
    <input type="radio" name="optradio" value="3">&emsp;
  </label>
  <label class="radio-inline">
    <input type="radio" name="optradio" value="4">&emsp;
  </label>
  <label class="radio-inline">
    <input type="radio" name="optradio" value="5">&emsp;
  </label>
  <label class="radio-inline">
    <input type="radio" name="optradio" value="6">&emsp;
  </label>
  <label class="radio-inline">
    <input type="radio" name="optradio" value="7">&emsp;
  </label>
  Not close


  <span id="demo"></span>
</div>



</div>
<div class="col-sm">

  <br>Rate the distance you believe each social identity is from defining who you are.<br><br>
  <div class="slidecontainer">
    <b>
      <script>
        document.write(localStorage[1]);
      </script>
    </b>
    <br>&emsp; Strongly held&emsp;
    <label class="radio-inline">
      <input type="radio" name="optradio" value="1">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="2">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="3">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="4">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="5">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="6">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="7">&emsp;
    </label>
    Weakly Held


  </form>
  <span id="demo"></span>
</div>
<div class="slidecontainer">
  <b>
    <script>
      document.write(localStorage[2]);
    </script>
  </b>
  <br>	  <form>&emsp;Strongly Held&emsp;
    <label class="radio-inline">
      <input type="radio" name="optradio" value="1">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="2">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="3">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="4">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="5">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="6">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="7">&emsp;
    </label>
    Weakly Held

  </form>
  <span id="demo"></span>
</div>
<div class="slidecontainer">
  <b>
    <script>
      document.write(localStorage[3]);
    </script>
  </b>
  &emsp;<form>&emsp; Strongly held &emsp;	 
    <label class="radio-inline">
      <input type="radio" name="optradio" value="1">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="2">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="3">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="4">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="5">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="6">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="7">&emsp;
    </label>
    Weakly Held

  </form>
  <span id="demo"></span>
</div>
<div class="slidecontainer">
  <b>
    <script>
      document.write(localStorage[4]);
    </script>
  </b>
  <form>&emsp;Strongly held &emsp;
    <label class="radio-inline">
      <input type="radio" name="optradio" value="1">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="2">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="3">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="4">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="5">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="6">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="7">&emsp;
    </label>
    Weakly Held

  </form>
  <span id="demo"></span>
</div>
<div class="slidecontainer">
  <b>
    <script>
      document.write(localStorage[5]);
    </script>
  </b>
  <form>&emsp;Not very close&emsp;    <label class="radio-inline">
    <input type="radio" name="optradio" value="1">&emsp;
  </label>
  <label class="radio-inline">
    <input type="radio" name="optradio" value="2">&emsp;
  </label>
  <label class="radio-inline">
    <input type="radio" name="optradio" value="3">&emsp;
  </label>
  <label class="radio-inline">
    <input type="radio" name="optradio" value="4">&emsp;
  </label>
  <label class="radio-inline">
    <input type="radio" name="optradio" value="5">&emsp;
  </label>
  <label class="radio-inline">
    <input type="radio" name="optradio" value="6">&emsp;
  </label>
  <label class="radio-inline">
    <input type="radio" name="optradio" value="7">&emsp;
  </label>
  Very close



  <span id="demo"></span>
</div>

<br>How often do you think about having each social identity and what you have in common with others who share that identity?<br><br>
<div class="slidecontainer">
  <b>
    <script>
      document.write(localStorage[1]);
    </script>
  </b>
  <br>&emsp; Hardly ever&emsp;
  <label class="radio-inline">
    <input type="radio" name="optradio" value="1" >&emsp;
  </label>
  <label class="radio-inline">
    <input type="radio" name="optradio" value="2">&emsp;
  </label>
  <label class="radio-inline">
    <input type="radio" name="optradio" value="3">&emsp;
  </label>
  <label class="radio-inline">
    <input type="radio" name="optradio" value="4">&emsp;
  </label>
  <label class="radio-inline">
    <input type="radio" name="optradio" value="5">&emsp;
  </label>
  <label class="radio-inline">
    <input type="radio" name="optradio" value="6">&emsp;
  </label>
  <label class="radio-inline">
    <input type="radio" name="optradio" value="7">&emsp;
  </label>
  A lot


</form>
<span id="demo"></span>
</div>
<div class="slidecontainer">
  <b>
    <script>
      document.write(localStorage[2]);
    </script>
  </b>
  <br>	  <form>&emsp;Hardly ever&emsp;
    <label class="radio-inline">
      <input type="radio" name="optradio" value="1" >&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="2">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="3">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="4">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="5">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="6">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="7">&emsp;
    </label>
    A lot

  </form>
  <span id="demo"></span>
</div>
<div class="slidecontainer">
  <b>
    <script>
      document.write(localStorage[3]);
    </script>
  </b>
  &emsp;<form>&emsp; Hardly ever &emsp;	 
    <label class="radio-inline">
      <input type="radio" name="optradio" value="1">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="2">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="3">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="4" >&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="5">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="6">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="7">&emsp;
    </label>
    A lot

  </form>
  <span id="demo"></span>
</div>
<div class="slidecontainer">
  <b>
    <script>
      document.write(localStorage[4]);
    </script>
  </b>
  <form>&emsp;Hardly ever&emsp;
    <label class="radio-inline">
      <input type="radio" name="optradio" value="1">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="2">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="3">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="4" >&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="5">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="6">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="7">&emsp;
    </label>
    A lot

  </form>
  <span id="demo"></span>
</div>
<div class="slidecontainer">
  <b>
    <script>
      document.write(localStorage[5]);
    </script>
  </b>
  <form>&emsp;Hardly ever &emsp;
    <label class="radio-inline">
      <input type="radio" name="optradio" value="1">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="2">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="3">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="4">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="5">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="6">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="7">&emsp;
    </label>
    A lot

  </form>
  <span id="demo"></span>
</div>



<br>How proud do you feel when someone who shares your social identity accomplishes something outstanding?<br><br>
<div class="slidecontainer">
  <b>
    <script>
      document.write(localStorage[1]);
    </script>
  </b>
  <br>&emsp; Not at all&emsp;
  <label class="radio-inline">
    <input type="radio" name="optradio" value="1">&emsp;
  </label>
  <label class="radio-inline">
    <input type="radio" name="optradio" value="2">&emsp;
  </label>
  <label class="radio-inline">
    <input type="radio" name="optradio" value="3">&emsp;
  </label>
  <label class="radio-inline">
    <input type="radio" name="optradio" value="4">&emsp;
  </label>
  <label class="radio-inline">
    <input type="radio" name="optradio" value="5">&emsp;
  </label>
  <label class="radio-inline">
    <input type="radio" name="optradio" value="6">&emsp;
  </label>
  <label class="radio-inline">
    <input type="radio" name="optradio" value="7">&emsp;
  </label>
  A great deal


</form>
<span id="demo"></span>
</div>
<div class="slidecontainer">
  <b>
    <script>
      document.write(localStorage[2]);
    </script>
  </b>
  <br>	  <form>&emsp;Not at all&emsp;
    <label class="radio-inline">
      <input type="radio" name="optradio" value="1">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="2">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="3">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="4">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="5">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="6">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="7">&emsp;
    </label>
    A great deal

  </form>
  <span id="demo"></span>
</div>
<div class="slidecontainer">
  <b>
    <script>
      document.write(localStorage[3]);
    </script>
  </b>
  &emsp;<form>&emsp;Not at all &emsp;	 
    <label class="radio-inline">
      <input type="radio" name="optradio" value="1">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="2">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="3">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="4">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="5">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="6">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="7">&emsp;
    </label>
    A great deal

  </form>
  <span id="demo"></span>
</div>
<div class="slidecontainer">
  <b>
    <script>
      document.write(localStorage[4]);
    </script>
  </b>
  <form>&emsp;Not at all &emsp;
    <label class="radio-inline">
      <input type="radio" name="optradio" value="1">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="2">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="3">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="4">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="5">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="6">&emsp;
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="7">&emsp;
    </label>
    A great deal

  </form>
  <span id="demo"></span>
</div>
<div class="slidecontainer">
  <b>
    <script>
      document.write(localStorage[5]);
    </script>
  </b>
  <form>&emsp;Not at all&emsp;    <label class="radio-inline">
    <input type="radio" name="optradio" value="1">&emsp;
  </label>
  <label class="radio-inline">
    <input type="radio" name="optradio" value="2">&emsp;
  </label>
  <label class="radio-inline">
    <input type="radio" name="optradio" value="3">&emsp;
  </label>
  <label class="radio-inline">
    <input type="radio" name="optradio" value="4">&emsp;
  </label>
  <label class="radio-inline">
    <input type="radio" name="optradio" value="5">&emsp;
  </label>
  <label class="radio-inline">
    <input type="radio" name="optradio" value="6">&emsp;
  </label>
  <label class="radio-inline">
    <input type="radio" name="optradio" value="7">&emsp;
  </label>
  A great deal

  <br><br><br>
  <span id="demo"></span>
</div>
</div>
</div>
</div>

</div></div>

@endsection

@section('javascript')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    
<script type="text/javascript">
  function doSubmit(){
    console.log('here');
    var a = document.getElementsByTagName("input");
    for(var i in a){
      if(a[i].checked)
        console.log(a[i].value);
    }
    return false;
  }

</script>
@endsection