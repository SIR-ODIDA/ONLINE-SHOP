<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
      <a class="navbar-brand" href="#">
        <span style="
        display: inline-block;
        position: relative;
        animation: moveText 5s linear infinite, changeColor 5s ease-in-out infinite;
    ">
        YOUR ONE-STOP SHOPPING DESTINATION
    </span>
</a>

<style>
@keyframes moveText {
    0% {
        left: 0;
    }
    100% {
        left: 100px;
    }
}

@keyframes changeColor {
    0% {
        color: red;
    }
    25% {
        color: orange;
    }
    50% {
        color: yellow;
    }
    75% {
        color: green;
    }
    100% {
        color: blue;
    }
}
</style>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav  ">
          <li class="nav-item active">
            <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              ABOUT US
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              Why Us
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              Testimonial
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>
        </ul>
        <div class="user_option">
            @if (Route::has('login'))

            @auth

            <a href="{{ url('mycart') }}">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i>

                {{ $count}}
            </a>

            <!-- Only the logout form should be here -->
            <form method="POST" action="{{ route('logout') }}" class="form-inline">
                @csrf
                <input type="submit" value="Logout" style="background-color: #ff6b6b; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
            </form>

            @else

            <a href="{{ url('/login') }}">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>Login</span>
            </a>

            <a href="{{ url('/register') }}">
                <i class="fa fa-vcard" aria-hidden="true"></i>
                <span>Register</span>
            </a>

            @endauth

        @endif

          </form>
        </div>
      </div>
    </nav>
  </header>
