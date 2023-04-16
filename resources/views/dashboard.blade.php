<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto" style="max-width: 600px" >
                <div class="pt-6 px-0 text-gray-900" id="app">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    let user_id = Number('{{ auth()->user()->id }}');
</script>
