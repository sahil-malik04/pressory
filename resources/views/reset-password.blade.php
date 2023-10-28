<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>


<form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col"  method="post" action="{{ route('password.forgot') }}">
 
      <p class=" flex flex-row items-center justify-center lg:justify-center text-lg mb-0 mr-4 text-gray-900 font-bold mt-2">Change Password</p>
    <div class="mb-4 w-96 mx-auto mt-10">
    <input type="hidden" name="forget_token" value="{{ $token }}">
      <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
      New Password
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-5" id="username" type="password" name="new_password">
    
      <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
      Confirm  Password
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="password" type="password" name="cpassword">

         <div class="text-right mt-6 mb-4">
      <button class="bg-sky-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full " type="submit">
        Submit
      </button>

    </div>

    </div>
   
 
</form>

 
</div>
</body>
</html>