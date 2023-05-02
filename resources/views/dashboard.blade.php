@extends('layouts.app')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg ">
            <div class="mb-5">
                <div class="col-12 mb-5">
                    <h1 class="text-4xl text-center underline underline-offset-1 mb-2">Get the Latest News</h1>
                    <p class="text-center text-xl font-small text-gray-400">Read the latest news quicker than your competitors</p>
            </div>

            <form class="grid grid-cols-3 gap-4 g-3" onsubmit="submitValidation(event);">
                <div>
                    <label for="keyword-input" class="block text-gray-700 font-bold mb-2">Contains keyword: </label>
                    <input type="text" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " id="keyword-input" value="">
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500 hidden" id="keyword-error"><span class="font-medium">Please allow either keyword in title exists or keyword in article exists at one time.</span></p>
                </div>
                <div>
                    <label for="title-input" class="block text-gray-700 font-bold mb-2">Contains keyword in Title: </label>
                    <input type="text" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="title-input" value="">
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500 hidden" id="keyword-title-error"><span class="font-medium">Please allow either keyword in title exists or keyword in article exists at one time.</span></p>
                </div>
                <div>
                    <label for="validationDefaultUsername" class="form-label" data-error="Please enter a country name">From country:</label>
                    <div class="input-group" id="country-input">
                        <button 
                            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center 
                            dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" 
                            type="button" id="dropdown-country" 
                            data-dropdown-toggle="dropdown" 
                            style="width: 100%;"
                            aria-haspopup="true" 
                            aria-expanded="false"
                            onclick="toggleDropdown('country')">
                            Countries
                        </button>
                        
                        <div id="checkbox-country" 
                            class="z-10 overflow-auto max-h-60 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700"
                            aria-labelledby="dropdown-country">
                        </div>
                    </div>
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500 hidden" id="country-error"><span class="font-medium">Please choose a maximum of 5 countries</span></p>
                </div>
                <div>
                    <label 
                        for="validationDefault03" 
                        class="form-label" 
                        data-error="Please choose a maximum of 5 categories">Category: 
                    </label>
                    <div class="dropdown">
                        <button 
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center 
                            dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" 
                            type="button" id="dropdown-category" 
                            data-dropdown-toggle="dropdown" 
                            style="width: 100%;"
                            aria-haspopup="true" 
                            aria-expanded="false"
                            onclick="toggleDropdown('category')">
                            Categories
                            
                        </button>
                        <div id="checkbox-category" 
                            class="z-10 overflow-auto max-h-60 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700"
                            aria-labelledby="dropdown-category">
                        </div>
                    </div>
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500 hidden" id="category-error"><span class="font-medium">Please choose a maximum of 5 categories</span></p>
                </div>
                <div>
                    <label 
                        for="validationDefault04" 
                        class="form-label"
                        data-error="Please choose a valid language"
                        >Language: 
                    </label>

                    <div class="dropdown" id="language-input">
                        <button 
                            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center 
                            dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" 
                            type="button" id="dropdown-language" 
                            data-dropdown-toggle="dropdown" 
                            style="width: 100%;"
                            aria-haspopup="true" 
                            aria-expanded="false"
                            onclick="toggleDropdown('language')">
                            Languages
                        </button>
                        <div id="checkbox-language" 
                            class="z-10 overflow-auto max-h-60 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700"
                            aria-labelledby="dropdown-language">
                        </div>
                    </div>
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500 hidden" id="language-error"><span class="font-medium">Please choose a maximum of 5 languages</span></p>

                </div>
                <div>
                    <label 
                        for="validationDefault05"
                        class="block text-gray-700 font-bold mb-2"
                        data-error="Please choose a valid domain">Domain: 
                    </label>
                    <input type="text" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="domain-input">
                    <div class="invalid-feedback">
                        Please provide a valid domain name. For example: bbc, nytimes,etc.
                    </div>
                </div>
                <div></div>
                <div class="flex justify-center">
                    <div class="w-1/2">
                        <div class="mx-auto">
                        <button style="width: 100%;" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Submit
                        </button>
                        </div>
                    </div>
                </div>
            </form>       
        </div>

        <div id="result-articles" class="p-5">
            <h6 class="text-center text-4xl font-extrabold dark:text-white">Result Articles</h6>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
    
    // categories headers
    const categories = ["Business", "Entertainment", "Environment", "Food", "Health", "Politics",
        "Science", "Sports", "Technology", "Top", "Tourism", "World"];

    // countries headers
    const countryObj = [
        {"Afghanistan": "af"},{"Algeria": "dz"},{"Angola": "ao"},{"Argentina": "ar"},{"Australia": "au"},{"Austria": "at"},{"Azerbaijan": "az"},{"Bahrain": "bh"},
        {"Bangladesh": "bd"},{"Belarus": "by"},{"Belgium": "be"},{"Bolivia": "bo"}, {"Bosnia&Herzegovina": "ba"}, {"Brazil": "br"}, {"Bulgaria": "bg"},
        {"Burkina Faso": "bf"}, {"Cambodia": "kh"}, {"Cameroon": "cm"}, {"Canada": "ca"}, {"Chile": "cl"}, {"China": "zh"}, {"Colombia": "co"},
        {"Costa Rica": "cr"}, {"Côte d'Ivoire": "ci"}, {"Croatia": "hr"}, {"Cuba": "cu"}, {"Cyprus": "cy"}, {"Czech Republic": "cz"}, {"Denmark": "dk"},
        {"Dominican Republic": "do"}, {"DR Congo": "cd"}, {"Ecuador": "ec"}, {"Egypt": "eg"}, {"El Salvador": "sv"}, {"Estonia": "ee"}, {"Ethiopia": "et"},
        {"Finland": "fi"}, {"France": "fr"}, {"Geogria": "ge"}, {"Germany": "de"}, {"Ghana": "gh"}, {"Greece": "gr"}, {"Guatemala": "gt"}, {"Honduras": "hn"},
        {"Hong Kong": "hk"}, {"Hungary": "hu"}, {"Iceland": "is"}, {"India": "in"}, {"Indonesia": "id"}, {"Iraq": "iq"}, {"Ireland": "ie"}, {"Isarel": "il"},
        {"Italy": "it"}, {"Japan": "jp"}, {"Jordan": "jo"}, {"Kazakhstan": "kz"}, {"Kenya": "ke"}, {"Kuwait": "kw"}, {"Latvia": "lv"}, {"Lebanon": "lb"},
        {"Libya": "ly"}, {"Lithuania": "lt"}, {"Luxembourg": "lu"}, {"Macau": "mo"}, {"Madagascar": "mg"}, {"Malawi": "mw"}, {"Malaysia": "my"}, {"Mali": "ml"},
        {"Mauritania": "mr"}, {"Mexico": "mx"}, {"Montenegro": "me"}, {"Morocco": "ma"}, {"Mozambique": "mz"}, {"Myanmar": "mm"}, {"Nepal": "np"}, {"Netherland": "nl"},
        {"New Zealand": "nz"}, {"Nigeria": "ng"}, {"North Korea": "kp"}, {"Norway": "no"}, {"Oman": "om"}, {"Pakistan": "pk"}, {"Panama": "pa"}, {"Paraguay": "py"},
        {"Peru": "pe"}, {"Philippines": "ph"}, {"Poland": "pl"}, {"Portugal": "pt"}, {"Puerto Rico": "pr"}, {"Romania": "ro"}, {"Russia": "ru"}, {"Saudi Arabia": "sa"},
        {"Senegal": "sn"}, {"Serbia": "rs"}, {"Singapore": "sg"}, {"Slovakia": "sk"}, {"Slovenia": "si"}, {"Somalia": "so"}, {"South Africa": "za"}, {"South Korea": "kr"},
        {"Spain": "es"}, {"Sri Lanka": "lk"}, {"Sudan": "sd"}, {"Sweden": "se"}, {"Switzerland": "ch"}, {"Taiwan": "tw"}, {"Tajikistan": "tj"}, {"Tanzania": "tz"},
        {"Thailand": "th"}, {"Tunisia": "tn"}, {"Turkey": "tr"}, {"Turkmenistan": "tm"}, {"Uganda": "ug"}, {"Ukraine": "ua"}, {"United Arab Emirates": "ae"}, {"United Kingdom": "gb"},
        {"United States of America": "us"}, {"Uruguay": "uy"}, {"Uzbekistan": "uz"}, {"Venezuela": "ve"}, {"Vietnam": "vi"}, {"Yemen": "ye"}, {"Zambia": "zm"}, {"Zimbabwe": "zw"}
    ];

    // language headers
    const languageObj = [
        {"Belarusian": "be"}, {"Afrikaans": "af"}, {"Amharic": "am", "Arabic": "ar"}, {"Azerbaijani": "az"}, {"Bengali": "bn"}, {"Bosnian": "bs"},
        {"Bulgarian": "bg"}, {"Burmese": "my"}, {"Central Kurdish": "ckb"}, {"Chinese": "zh"}, {"Croatian": "hr"}, {"Czech": "cs"}, {"Danish": "da"},
        {"Dutch": "nl"}, {"English": "en"}, {"Estonian": "et"}, {"Filipino": "pi"}, {"Finnish": "fi"}, {"French": "fr"}, {"Georgian": "ka"}, {"German": "de"},
        {"Greek": "el"}, {"Hebrew": "he"}, {"Hindi": "hi"}, {"Hungarian": "hu"}, {"Icelandic": "is"}, {"Indonesian": "in"}, {"Italian": "it"}, {"Japanese": "jp"},
        {"Khmer": "kh"}, {"Korean": "ko"}, {"Latvian": "lv"}, {"Lithuanian": "lt"}, {"Luxembourgish": "lb"}, {"Malay": "ms"}, {"Nepali": "ne"}, {"Norwegian": "no"},
        {"Pashto": "ps"}, {"Persian": "fa"}, {"Polish": "pl"}, {"Portuguese": "pt"}, {"Romanian": "ro"}, {"Russian": "ru"}, {"Serbian": "sr"}, {"Shona": "sn"},
        {"Sinhala": "si"}, {"Slovak": "sk"}, {"Slovenian": "sl"}, {"Somali": "so"}, {"Spanish": "es"}, {"Swahili": "sw"}, {"Swedish": "sv"}, {"Tajik": "tg"},
        {"Tamil": "ta"}, {"Thai": "th"}, {"Turkish": "tr"}, {"Turkmen": "tk"}, {"Ukrainian": "uk"}, {"Urdu": "ur"}, {"Uzbek": "uz"}, {"Vietnamese": "vi"}
    ]

    function toggleDropdown(checkboxtype){
        document.getElementById(`checkbox-${checkboxtype}`).classList.toggle('hidden')
    }

    // render every single checkboxes for categories, countries, and languages.
    function renderAllCheckboxes(checkboxtype, name){
        const parent = document.getElementById(`checkbox-${checkboxtype}`);
        
        // Loop to create 10 checkboxes
        for (let i = 0; i < name.length; i++) {
            // Create a unique ID for each checkbox
            const id = `checkbox-${i}`;

            // Create the checkbox element
            const a = document.createElement('a');
            a.classList.add('block', 'px-4', 'py-2')
            
            let key = ""
            let val = ""
            if(checkboxtype === 'language' || checkboxtype === 'country'){
                for(prop in name[i]){
                    key = prop
                    val = name[i][prop]
                }
            }

            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.id = id;
            
            // Create the label element
            const label = document.createElement('label');
            label.setAttribute('for', id);

            if(checkboxtype === 'language' || checkboxtype === 'country'){
                checkbox.value = `${val}`;
                label.innerHTML = `${key}`
            }else{
                label.innerHTML = ` ${name[i]}`;
                checkbox.value = `${name[i]}`
            }

            // Add the checkbox and label to the parent element
            a.appendChild(checkbox)
            a.appendChild(label)

            parent.appendChild(a);
        }
    }

    // render all of the categories checkboxes
    renderAllCheckboxes('category', categories)
    // render all of the languages checkboxes
    renderAllCheckboxes('language', languageObj)
    // render all of the countries checkboxes
    renderAllCheckboxes('country', countryObj)

    // a function to validate the input when the user submits the form
    function submitValidation(event){
        event.preventDefault()
        let q = document.getElementById("keyword-input");
        let qInTitle = document.getElementById("title-input");
        let language = document.getElementById("language-input");
        let domain = document.getElementById("domain-input");
        let country = document.getElementById("country-input");

        // check if categories checkbox has less than or equal to 5
        let categories_checkboxes = document.querySelector("#checkbox-category")
        let categories_checked = categories_checkboxes.querySelectorAll('input[type=checkbox]:checked')
        
        let language_checkboxes = document.querySelector("#checkbox-language")
        let language_checked = language_checkboxes.querySelectorAll('input[type=checkbox]:checked')

        let country_checkboxes = document.querySelector("#checkbox-country")
        let country_checked = country_checkboxes.querySelectorAll('input[type=checkbox]:checked')

        // check if the user has checked more than 5 checkboxes.
        if(categories_checked.length > 5){
            showInvalidError('category')
            return false;
        }else{
            removeInvalidError('category')
        }

        if(language_checked.length > 5){
            showInvalidError('language')
            return false;
        }else{
            removeInvalidError('language')
        }

        if(country_checked.length > 5){
            showInvalidError('country')
            return false;
        }else{
            removeInvalidError('country')
        }

        // retrieve all of the categories being chosen by the user
        let listCategories = ''
        for(let i = 0; i < categories_checked.length; i++){
            if(i > 0) listCategories = listCategories.concat(",")
            console.log(categories_checked[i])
            listCategories = listCategories.concat(categories_checked[i].value.toLowerCase())
        }

        // retrieve all of the languages being chosen by the user
        let listLanguages = ''
        for(let i = 0; i < language_checked.length; i++){
            if(i > 0) listLanguages = listLanguages.concat(",")
            listLanguages = listLanguages.concat(language_checked[i].value.toLowerCase())
        }

        // retrieve all of the countries being chosen by the user
        let listCountries = ''
        for(let i = 0; i < country_checked.length; i++){
            if(i > 0) listCountries = listCountries.concat(",")
            listCountries = listCountries.concat(country_checked[i].value.toLowerCase())
        }

        // check if q and qTitle exists since only one of the field can exist at one time
        if(q.value.length > 0 && qInTitle.value.length > 0){
            showInvalidError('keyword')
            showInvalidError('keyword-title')
            return false;
        }else{
            removeInvalidError('keyword')
            removeInvalidError('keyword-title')
        }
        
        // a Javascript object before being converted into JSON format and post into the back-end for further processing
        const payload = 
        { 
            "q": q.value,
            "qInTitle": qInTitle.value,
            "country": listCountries,
            "category": listCategories,
            "language": listLanguages,
            "domain": domain.value
        }

        // a method to post the data from front-end to back-end PHP for processing
        fetch('/dashboard', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(
                payload
            )
        })
        .then(response => response.json())
        .then(data => {
            data = JSON.parse(data)
            console.log(data.results)
            let articles = document.getElementById('result-articles')
            let res = data.results;
            if(res.length == 0) {
                noResult(articles)
                return false;
            }

            removeAllArticles(articles)

            for(let i = 0; i < res.length; i++){
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

                // reformat for uniformity
                languageString = res[i].language.charAt(0).toUpperCase() + res[i].language.slice(1)
                img.style.display = "block";
                img.style.margin = "auto";
                
                // set the value of the elements
                title.innerHTML = "Article " + (i + 1) + ": " + res[i].title;
                content.innerHTML = res[i].content;
                if(res[i].image_url != null) img.src = res[i].image_url;
                a.href = res[i].link;
                a.innerHTML = "Full link to article: " + res[i].link;
                source.innerHTML = "Source: " + res[i].source_id;
                language.innerHTML = "Language: " + languageString;
                pubDate.innerHTML = "Publication Time: " + res[i].pubDate;

                // loop over all of creators
                creator.innerHTML = "Creator: ";
                if (res[i].creator === null) creator.innerHTML += 'Unknown' 
                else{
                    for(let j = 0; j < res[i].creator.length; j++){
                        creator.innerHTML += `${res[i].creator[j]}`;
                        if(j < res[i].creator.length - 1) creator.innerHTML += ', ';
                    }
                }

                // loop over all of the categories
                for(let j = 0; j < res[i].category.length; j++){
                    categories.innerHTML += `<span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">${res[i].category[j]}</span>`;
                }

                // loop over all of the countries
                for(let j = 0; j < res[i].country.length; j++){
                    countries.innerHTML += `<span class="bg-green-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-400 border border-gray-500">${res[i].country[j]}</span>`;
                }
                
                // loop over all of the keywords
                let keywordLength = res[i].keywords !== null ? res[i].keywords.length : 0
                for(let j = 0; j < keywordLength; j++){
                    keywords.innerHTML += `<span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">${res[i].keywords[j]}</span>`;
                }

                // append the newly created elements to the parent element
                articles.appendChild(title)
                articles.appendChild(content)
                articles.append(img)
                articles.appendChild(a)
                articles.appendChild(source)
                articles.appendChild(language)
                articles.appendChild(pubDate)
                articles.appendChild(creator)
                articles.appendChild(categories)
                articles.appendChild(countries)
                articles.appendChild(keywords)
            }
        }).catch(error => {
            // handle when an error occurs
            let articles = document.getElementById('result-articles')
            noResult(articles)
            return false;
        });

        return true;
    }

    // remove all articles when a new query is made
    function removeAllArticles(parent_articles){
        let child = parent_articles.lastElementChild; 
            // remove every articles when a new query is made by the user
        while (child) {
            parent_articles.removeChild(child);
            child = parent_articles.lastElementChild;
        }
    }

    // a function to handle when the query cannot retrieve any result
    function noResult(articles){
        removeAllArticles(articles)
        const notifyNoResult = document.createElement('h4')
        notifyNoResult.innerHTML = 'No results matches the criteria!'
        notifyNoResult.style.textAlign = 'center'
        notifyNoResult.classList.add('text-4xl', 'font-extrabold', 'dark:text-white')
        articles.appendChild(notifyNoResult)
    }

    // show a customized error when the input does not match the specified criteria
    function showInvalidError(tocheck){
       const err = document.getElementById(`${tocheck}-error`)
       err.classList.remove('hidden');
    }

    // remove the customized error when the input does not match the specified criteria
    function removeInvalidError(tocheck){
        const err = document.getElementById(`${tocheck}-error`)
        err.classList.add('hidden');
    }      
</script>    
@endsection