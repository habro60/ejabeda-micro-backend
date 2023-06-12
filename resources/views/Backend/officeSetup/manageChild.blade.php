<ul>
    @foreach ($childs as $child)
        <li>
            {{ $child->office_name }}
            @if (count($child->childs))
                @include('Backend.officeSetup.manageChild', ['childs' => $child->childs])
            @endif
        </li>
    @endforeach
</ul>
