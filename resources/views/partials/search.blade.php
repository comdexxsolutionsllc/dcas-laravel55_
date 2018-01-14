<div id="row">
    <div id="search-box">
        <form class="typeahead" role="search">
            <div class="form-group">
                <input type="search" name="q" class="form-control search-input" placeholder="Search" autocomplete="off">
            </div>
        </form>
    </div>
</div>

@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>

    <script>
        jQuery(document).ready(function ($) {
            // Set the Options for "Bloodhound" suggestion engine
            let engine = new Bloodhound({
                remote: {
                    url: '/find?q=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            $(".search-input").typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                source: engine.ttAdapter(),

                // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                name: 'usersList',

                // the key from the array we want to display (name,id,email,etc...)
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function (data) {
                        return '<a href="/dashboard/profile/' + data.username + '" class="list-group-item">' + data.name + ' - @' + data.username + '</a>'
                    }
                }
            });
        });
    </script>
@endsection

@section('css')
    <style>
        .search-input {
            margin-left: 25px;
        }
        .list-group-item {
            margin-left: 25px;
        }
    </style>
@endsection