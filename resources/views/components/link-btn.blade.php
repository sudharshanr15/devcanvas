@props([ "active" => false, "href" ])

<a href="{{$href}}" class="{{'me-4 px-6 py-4 rounded' . ($active ? " bg-neutral-200" : '')}}">{{$slot}}</a>
