@extends('layouts.app')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
        <h1 class="max-w-lg text-3xl font-semibold leading-loose text-gray-900 dark:text-white">
            Metrics
        </h1>

        <div class="">
            <div>
                <p class="font-semibold text-yellow-600 underline dark:text-white decoration-indigo-500">Total number of Posts: </p>
                <button type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-yellow-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Total number of Posts
                <span class="inline-flex items-center justify-center w-4 h-4 ml-2 text-xs font-semibold text-blue-800 bg-yellow-200 rounded-full">
                    {{ $numPosts }}
                </span>
            </div>
            
            <br/><br/>
            
            <div>
                <div>
                    <p class="font-semibold text-blue-900 underline dark:text-white decoration-indigo-500">Top 5 Highest Frequency by Categories: </p>
                    @foreach($numCategoriesMax as $cat)

                    <button type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        {{ $cat->name }}
                    <span class="inline-flex items-center justify-center w-4 h-4 ml-2 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
                        {{ $cat->count }}
                    </span>
                    </button>

                    @endforeach
                </div>
            </div>
                

            <div>
                <div>
                <p class="font-semibold text-green-700 underline dark:text-white decoration-indigo-500">Top 5 Highest Frequency by Languages: </p>
                    @foreach($numLanguagesMax as $lang)
                    <button type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        {{ $lang->language }}
                    <span class="inline-flex items-center justify-center w-4 h-4 ml-2 text-xs font-semibold text-blue-800 bg-green-200 rounded-full">
                        {{ $lang->count }}
                    </span>
                    </button>
                    @endforeach
                </div>
            </div>
                
            <div>
                <p class="font-semibold text-red-600 underline dark:text-white decoration-indigo-500">Top 5 Highest Frequency by Countries: </p>
                @foreach($numCountriesMax as $country)
                    
                <button type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    {{ $country->name }}
                <span class="inline-flex items-center justify-center w-4 h-4 ml-2 text-xs font-semibold text-blue-800 bg-red-200 rounded-full">
                    {{ $country->count }}
                </span>
                </button>

                @endforeach
            </div>

            <div>
                <p class="font-semibold text-red-600 underline dark:text-white decoration-blue-500">Top 5 Highest Frequency by Keywords: </p>
                @foreach($numKeywordsMax as $keyword)
                    
                <button type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-yellow-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    {{ $keyword->name }}
                <span class="inline-flex items-center justify-center w-4 h-4 ml-2 text-xs font-semibold text-blue-800 bg-yellow-200 rounded-full">
                    {{ $keyword->count }}
                </span>
                </button>

                @endforeach
            </div>

            <br/><br/>

            <div>
                <div>
                    <p class="font-semibold text-blue-600 underline dark:text-white decoration-indigo-500">Top 5 Lowest Frequency by Categories: </p>
                    @foreach($numCategoriesMin as $cat)

                    <button type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        {{ $cat->name }}
                    <span class="inline-flex items-center justify-center w-4 h-4 ml-2 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
                        {{ $cat->count }}
                    </span>
                    </button>

                    @endforeach
                </div>
            </div>
                

            <div>
                <p class="font-semibold text-green-600 underline dark:text-white decoration-indigo-500">Top 5 Lowest Frequency by Languages: </p>
                @foreach($numLanguagesMin as $lang)
                
                <button type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    {{ $lang->language }}
                <span class="inline-flex items-center justify-center w-4 h-4 ml-2 text-xs font-semibold text-blue-800 bg-green-200 rounded-full">
                    {{ $lang->count }}   
                </span>
                </button>

                @endforeach
            </div>
                
            <div>
                <p class="font-semibold text-red-600 underline dark:text-white decoration-indigo-500">Top 5 Lowest Frequency by Countries: </p>
                @foreach($numCountriesMin as $country)
                    
                <button type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    {{ $country->name }}
                <span class="inline-flex items-center justify-center w-4 h-4 ml-2 text-xs font-semibold text-blue-800 bg-red-200 rounded-full">
                    {{ $country->count }}
                </span>
                </button>

                @endforeach
            </div>

            <div>
                <p class="font-semibold text-red-600 underline dark:text-white decoration-yellow-500">Top 5 Lowest Frequency by Keywords: </p>
                @foreach($numKeywordsMin as $keyword)
                    
                <button type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-yellow-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    {{ $keyword->name }}
                <span class="inline-flex items-center justify-center w-4 h-4 ml-2 text-xs font-semibold text-blue-800 bg-yellow-200 rounded-full">
                    {{ $keyword->count }}
                </span>
                </button>

                @endforeach
            </div>
        </div>
        
        <br/><br/>
        <div>
            <form onsubmit="submitValidation(event);">
                @csrf
                <h2 class="text-lg font-bold dark:text-white">Top Recent Posts:  </h2>
                <input type="text" id="top_posts" class="mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Please specify the number of articles. Example: 1,5,10,..." required>
                <h2 class="text-lg font-bold dark:text-white">Specified keyword in title:  </h2>
                <input type="text" id="search-title-keywords" class="mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Please specify the keyword in the title. Example: AI, Machine Learning...">
                <button id="submit-btn" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>
    <div id="posts"></div>
</div>     
@endsection

<script>
    function submitValidation(event){
        event.preventDefault();
        const numTopPosts = document.getElementById('top_posts').value
        const titleKeyword = document.getElementById('search-title-keywords').value
        console.log(numTopPosts)
        fetch('/posts', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(
                {
                    'k': numTopPosts,
                    'titleKeyword': titleKeyword 
                }
            )
        }).then(response => response.json())
        .then(data => {
            console.log(data)
            const parent = document.getElementById('posts')

            // remove all child nodes
            if(parent.hasChildNodes()){
                while (parent.firstChild) {
                    parent.removeChild(parent.firstChild);
                }
            }
            for(let i = 0; i < data.length; i++){
                // create the elements of an article
                const title =  document.createElement('h4')
                const content = document.createElement('p')
                const img = document.createElement("img");
                const a = document.createElement('a')
                const source = document.createElement('h6')
                const language = document.createElement('h6')
                const pubDate = document.createElement('h6')
                const creator = document.createElement('h6')
                const categories = document.createElement('span')
                const countries = document.createElement('span')
                const keywords = document.createElement('span')
                // format
                title.classList.add('text-2xl', 'font-semibold')
                source.classList.add('text-md', 'font-semibold')
                language.classList.add('text-md', 'font-semibold')
                creator.classList.add('text-md', 'font-semibold')
                pubDate.classList.add('text-md', 'font-semibold')
                a.classList.add('text-md', 'font-semibold')

                // reformat image
                img.style.display = "block";
                img.style.margin = "auto";

                // reformat language
                languageString = data[i].language.charAt(0).toUpperCase() + data[i].language.slice(1)

                // set the value of the elements
                title.innerHTML = "Article " + (i + 1) + ": " + data[i].title;
                content.innerHTML = data[i].content;
                if(data[i].imageurl != null) img.src = data[i].imageurl;
                a.href = data[i].link;
                a.innerHTML = "Full link to article: " + data[i].link;
                source.innerHTML = "Source: " + data[i].source;
                language.innerHTML = "Language: " + data[i].language;
                pubDate.innerHTML = "Publication Time: " + data[i].pubdate;
                
                // loop over all of the categories
                for(let j = 0; j < data[i].tags.length; j++){
                    categories.innerHTML += `<span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">${data[i].tags[j].name}</span>`;
                }

                // loop over all of the countries
                for(let j = 0; j < data[i].countries.length; j++){
                    countries.innerHTML += `<span class="bg-green-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-400 border border-gray-500">${data[i].countries[j].name}</span>`;
                }

                // loop over all of the keywords
                let keywordLength = data[i].keywords !== null ? data[i].keywords.length : 0
                for(let j = 0; j < keywordLength; j++){
                    keywords.innerHTML += `<span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">${data[i].keywords[j].name}</span>`;
                }

                let creatorLength = data[i].creator !== null ? data[i].creators.length : 0
                for(let j = 0; j < creatorLength; j++){
                    creator.innerHTML += data[i].creators[j].name
                }

                console.log('pass')

                // append the newly created elements to the parent element
                parent.appendChild(title)
                parent.appendChild(content)
                parent.append(img)
                parent.appendChild(a)
                parent.appendChild(source)
                parent.appendChild(language)
                parent.appendChild(pubDate)
                parent.appendChild(creator)
                parent.appendChild(categories)
                parent.appendChild(countries)
                parent.appendChild(keywords)
            }
        })
    }    
</script>