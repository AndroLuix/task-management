
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="{{route('dashboard')}}" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="{{asset('img/dot-arrow.png')}}" class="h-8" alt="Flowbite Logo">
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Accellera</span>
    </a>
    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get started</button>
        <button type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false" id="toggleButton">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
    </div>
    
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
      <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="#" 
          class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent 
          md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
        </li>
        
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 
          rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 
          md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 
          dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 
          rounded hover:bg-gray-100 md:hover:bg-transparent 
          md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500
           dark:text-white dark:hover:bg-gray-700 dark:hover:text-white 
           md:dark:hover:bg-transparent dark:border-gray-700">Tasks</a>
        </li>
        @if (Auth::user()->is_manager == 1)
        <li>
          <a href="{{ route('folder.index')}}" class="block py-2 px-3 text-gray-900 
          rounded hover:bg-gray-100 md:hover:bg-transparent 
          md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500
           dark:text-white dark:hover:bg-gray-700 dark:hover:text-white 
           md:dark:hover:bg-transparent dark:border-gray-700">Folders</a>
        </li>
        @else
        <li>
          <a href="{{ route('project.index') }}" class="block py-2 px-3 text-gray-900 
          rounded hover:bg-gray-100 md:hover:bg-transparent 
          md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500
           dark:text-white dark:hover:bg-gray-700 dark:hover:text-white 
           md:dark:hover:bg-transparent dark:border-gray-700">Projects</a>
        </li>
        @endif
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded 
          hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 
          md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 
          dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded 
          hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700
           md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700
            dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
        </li>
        <li>
          <a href="{{route('logout')}}" class="block py-2 px-3 text-gray-900 rounded 
          hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700
           md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700
            dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Logout</a>
        </li>
      </ul>
    </div>
    </div>
  </nav>
  
<script>
  $(document).ready(function() {
      $('#toggleButton').click(function() {
          var navbarSticky = $('#navbar-sticky');
          var ariaExpanded = $(this).attr('aria-expanded');
          
          if (ariaExpanded === "false") {
              navbarSticky.slideDown();
              $(this).attr('aria-expanded', 'true');
          } else {
              navbarSticky.slideUp();
              $(this).attr('aria-expanded', 'false');
          }
      });
  });
</script>