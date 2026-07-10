<div class="bg-white shadow px-6 py-4 flex justify-between items-center">

    <h2 class="text-xl font-semibold">

        Dashboard

    </h2>

    <div class="flex items-center gap-4">

        <div>

            <strong>{{ Auth::user()->name }}</strong>

            <br>

            <small>{{ Auth::user()->role->role_name }}</small>
            

        </div>

        <form action="/logout" method="POST">

            @csrf

            <button class="bg-red-500 text-white px-4 py-2 rounded">

                Logout

            </button>

        </form>

    </div>

</div>