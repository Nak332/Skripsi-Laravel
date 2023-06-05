
{{-- card untuk list antrian pasien di resepsi --}}

<div x-data="{ expanded: false }" @click="expanded = !expanded" href="#" class="cursor-pointer" @click.outside="expanded = false" >
    <div class="truncate bg-gray-300 p-3 m-4 rounded-lg hover:bg-blue-500
    hover:ml-5 hover:mr-3 hover:border-black
    hover:text-white hover:transition-all ">
        <p class="">A5 - Satria Narayana</p>
        <div class="pt-2 " x-show="expanded" x-collapse>
            
            <p class="border-t-2 pb-2 border-white"></p>
            <p>Jl Utama P6 / 444C </p>
            <p>Pria</p>
            <p>28 Tahun</p>
        </div>
    </div>
</div>


