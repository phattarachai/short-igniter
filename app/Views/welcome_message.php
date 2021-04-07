<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Short-Igniter</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

    <link rel="stylesheet" href="css/app.css"/>
</head>
<body class="bg-gradient-to-br from-blue-300 to-purple-300 min-h-screen font-roboto">

<header class="my-8 mx-auto max-w-3xl">

    <div class=" bg-clip-text text-transparent bg-gradient-to-r from-red-300 via-red-500 to-red-700 uppercase">
        <h1 class="text-3xl md:text-7xl font-bold  ">Short Igniter</h1>
    </div>

</header>

<section class="max-w-3xl mx-auto">

    <form action="<?= route_to('url.store') ?>" method="post">

        <label class="flex text-3xl w-full">
            <input type="url"
                   placeholder="ระบุ URL ที่ต้องการย่อ"
                   required
                   class="mr-2 flex-1 p-4 bg-transparent border-b-2 focus:border-red-400 focus:outline-none placeholder-red-100
               placeholder-opacity-50 hover:placeholder-opacity-75 text-blue-700 focus:bg-white focus:bg-opacity-10"
                   name="url"
            />
            <button type="submit"
                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                ย่อ
            </button>
        </label>
    </form>

</section>

<?php if (($short = session()->getFlashdata('url')) !== null) { ?>
    <section class="mt-8 lg:mt-16 w-full lg:w-[92vw] mx-auto">
        Url ของคุณคือ
        <div class="text-3xl font-bold text-red-700">
            <?= base_url($short) ?>
        </div>
    </section>
<?php } ?>
<section class="mt-8 lg:mt-16 w-full lg:w-[92vw] mx-auto">


    <?php if (count($urls) > 0) { ?>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    URL
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Destination
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    สร้างเมือ
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    เข้าดูล่าสุดเมื่อ
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Visit Count
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($urls as $url) { ?>
                                <tr class="bg-white">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        <a href="<?= base_url($url['slug']) ?>">
                                            <?= base_url($url['slug']) ?>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <a href="<?= $url['url_destination'] ?>">
                                            <?= $url['url_destination'] ?>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <?= thaidate('j M y H:i', $url['created_at']) ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                        <?= $url['last_visit_at']
                                            ? thaidate('j M y H:i', $url['last_visit_at'])
                                            : '-' ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">
                                        <?= $url['visit_count'] ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>

</section>
<footer class="text-center text-gray-500 mt-8">
    <a href="https://github.com/phattarachai/short-igniter"
       target="_blank" rel="noopener"
       class="flex items-center justify-center space-x-2">
        <svg class="octicon octicon-mark-github v-align-middle" height="32" viewBox="0 0 16 16" version="1.1" width="32"
             aria-hidden="true">
            <path fill-rule="evenodd"
                  d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path>
        </svg>
        <span class="text-gray-500 text-lg">
        GitHub
        </span>
    </a>
</footer>

</body>
</html>
