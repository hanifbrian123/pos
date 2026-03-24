<thead>
    <tr class="border-y border-[#E2E8F0] bg-[#F8FAFC]/50">
        @foreach ($columns as $c)
            @php
                $class = "px-6 py-4 text-sm font-semibold text-[#64748B] uppercase tracking-wider".' '.$c['additionalClasses'];
            @endphp
            <th {{ $attributes->merge(['class'=>$class]) }}> {{ $c['name'] }} </th>
        @endforeach
    </tr>
</thead>




{{-- 
misale nk pengen nambah atribut custom: assign ae. ngko karek di merge attribut nk kene
--}}