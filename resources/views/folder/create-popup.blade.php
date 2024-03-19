
<div class="flex flex-col items-center justify-center px-6 py-8 mx-auto">
    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 my-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div
        class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                Create a folder
            </h1>
            <form id="form-folder" method="POST" class="space-y-4 md:space-y-6" action="{{ route('folder.create') }}">
                @csrf

              

                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900
                         sm:text-sm rounded-lg focus:ring-primary-600
                          focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 
                          dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Name Folder" required="">
                </div>
                <div>
                    
                
                <button type="submit"
                    class="w-full text-white
                     bg-primary-600 hover:bg-primary-700 focus:ring-4 
                     focus:outline-none focus:ring-primary-300 font-medium 
                     rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 
                     dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                     Create </button>
                
            </form>
        </div>
    </div>
</div>