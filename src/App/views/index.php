<?php include $this->resolve("partials/_header.php"); ?>
<!-- Start Main Content Area -->
<section class="container mx-auto page-section panel">
    <!-- Page header: title + New Transaction button -->
    <div class="tx-header flex items-center justify-between border-b border-gray-200 pb-4">
        <h4 class="font-medium text-lg text-gray-900">Transaction List</h4>
        <div class="tx-header__actions flex gap-3">
            <a href="/transaction" class="new-tx-btn action-chip action-chip--sky px-3 py-2 font-semibold hover:bg-sky-500 hover:text-white transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                New Transaction
            </a>
        </div>
    </div>

    <!-- Search Form -->
    <form method="GET" class="mt-4 w-full">
        <div class="flex">
 mobile-responsive-transaction-cards-7b11b
            <input value="<?= e($searchTerm ?? '') ?>" name="s" type="text" placeholder="Enter search term"
                class="w-full rounded-l-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm" />
            <button type="submit" class="rounded-r-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition">

            <input value="<?php echo $searchTerm ?? ''; ?>" name="s" type="text" class="w-full rounded-l-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter search term" />
            <button type="submit" class="rounded-r-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">

                Search
            </button>
        </div>
    </form>

    <?php if (count($transactions) === 0): ?>
        <p class="tx-empty mt-8 mb-4 text-center text-sm text-gray-500">
            No transactions found<?= !empty($searchTerm) ? ' for &ldquo;' . e($searchTerm) . '&rdquo;' : '' ?>.
        </p>
    <?php else: ?>

        <!-- ================= MOBILE LAYOUT: TRANSACTION CARDS =================
             Rendered ONLY below 768px (hidden by the desktop.css media query).
             Styled exclusively in resources/css/mobile.css -> never mixes with
             the desktop table styles. -->
        <div class="tx-cards md:hidden">
            <?php foreach ($transactions as $transaction): ?>
                <article class="tx-card">
                    <div class="tx-card__head">
                        <h5 class="tx-card__description"><?= e($transaction['description']) ?></h5>
                        <span class="tx-card__amount"><?= e($transaction['amount']) ?></span>
                    </div>

                    <p class="tx-card__date">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="tx-card__date-icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                        </svg>
                        <?= e($transaction['formatted_date']) ?>
                    </p>

                    <div class="tx-card__receipts">
                        <?php if (count($transaction['receipts']) > 0): ?>
                            <?php foreach ($transaction['receipts'] as $receipt): ?>
                                <span class="receipt-item">
                                    <a class="inline-flex items-center gap-1" href="/transaction/<?= e($transaction['id']) ?>/receipt/<?= e($receipt['id']) ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="receipt-item__icon">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                        </svg>
                                        View receipt
                                    </a>
                                    <form action="/transaction/<?= e($transaction['id']) ?>/receipt/<?= e($receipt['id']) ?>" method="POST" class="contents">
                                        <?php include $this->resolve("partials/_csrf.php"); ?>
                                        <input type="hidden" name="_METHOD" value="DELETE" />
                                        <button type="submit" class="receipt-item__remove" aria-label="Remove receipt">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </button>
                                    </form>
                                </span>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <span class="tx-card__no-receipts">No receipts attached</span>
                        <?php endif; ?>
                    </div>

                    <div class="tx-card__actions">
                        <a href="/transaction/<?= e($transaction['id']) ?>/receipt" class="tx-card__action tx-card__action--amber">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15M9 12l3 3m0 0l3-3m-3 3V2.25" />
                            </svg>
                            Add Receipt
                        </a>
                        <a href="/transaction/<?= e($transaction['id']) ?>" class="tx-card__action tx-card__action--emerald">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            Edit
                        </a>
                        <form action="/transaction/<?= e($transaction['id']) ?>" method="POST">
                            <input type="hidden" name="_METHOD" value="DELETE" />
                            <?php include $this->resolve('partials/_csrf.php'); ?>
                            <button type="submit" class="tx-card__action tx-card__action--red">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                                Delete
                            </button>
                        </form>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <!-- ================= DESKTOP LAYOUT: TRANSACTIONS TABLE =================
             Rendered ONLY at 768px and above (hidden by the mobile.css media query).
             Styled exclusively in resources/css/desktop.css -> never mixes with
             the mobile card styles. -->
        <table class="tx-table hidden md:table">
            <thead>
                <tr>
                    <th class="tx-th">Description</th>
                    <th class="tx-th">Amount</th>
                    <th class="tx-th">Receipt(s)</th>
                    <th class="tx-th">Date</th>
                    <th class="tx-th">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $transaction): ?>
                    <tr class="tx-tr">
                        <td class="tx-td tx-td--description"><?= e($transaction['description']) ?></td>
                        <td class="tx-td tx-td--amount"><?= e($transaction['amount']) ?></td>
                        <td class="tx-td">
                            <?php if (count($transaction['receipts']) > 0): ?>
                                <div class="tx-receipts">
                                    <?php foreach ($transaction['receipts'] as $receipt): ?>
                                        <span class="tx-receipt">
                                            <a href="/transaction/<?= e($transaction['id']) ?>/receipt/<?= e($receipt['id']) ?>" title="View receipt">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="tx-receipt__icon">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                                </svg>
                                            </a>
                                            <form action="/transaction/<?= e($transaction['id']) ?>/receipt/<?= e($receipt['id']) ?>" method="POST">
                                                <?php include $this->resolve("partials/_csrf.php"); ?>
                                                <input type="hidden" name="_METHOD" value="DELETE" />
                                                <button type="submit" class="tx-receipt__remove" aria-label="Remove receipt">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <span class="tx-td text-gray-400 italic">—</span>
                            <?php endif; ?>
                        </td>
                        <td class="tx-td"><?= e($transaction['formatted_date']) ?></td>
                        <td class="tx-td tx-td--actions">
                            <div class="tx-actions">
                                <a href="/transaction/<?= e($transaction['id']) ?>/receipt" class="action-btn action-btn--amber" title="Add receipt">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15M9 12l3 3m0 0l3-3m-3 3V2.25" />
                                    </svg>
                                </a>
                                <a href="/transaction/<?= e($transaction['id']) ?>" class="action-btn action-btn--emerald" title="Edit transaction">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </a>
                                <form action="/transaction/<?= e($transaction['id']) ?>" method="POST" class="contents">
                                    <input type="hidden" name="_METHOD" value="DELETE" />
                                    <?php include $this->resolve('partials/_csrf.php'); ?>
                                    <button type="submit" class="action-btn action-btn--red" title="Delete transaction">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <!-- Pagination -->
    <nav class="flex items-center justify-between border-t border-gray-200 px-4 sm:px-0 mt-6" aria-label="Pagination">
        <!-- Previous Page Link -->
        <div class="-mt-px flex w-0 flex-1">
            <?php if ($currentPage > 1): ?>
                <a href="/?<?= e($previousPageQuery) ?>" class="pagination__link pr-1">
                    <svg class="pagination__arrow-icon mr-3" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M18 10a.75.75 0 01-.75.75H4.66l2.1 1.95a.75.75 0 11-1.02 1.1l-3.5-3.25a.75.75 0 010-1.1l3.5-3.25a.75.75 0 111.02 1.1l-2.1 1.95h12.59A.75.75 0 0118 10z" clip-rule="evenodd" />
                    </svg>
                    Previous
                </a>
            <?php endif; ?>
        </div>
        <!-- Pages Link -->
        <div class="hidden md:-mt-px md:flex">
            <?php foreach ($currentPageQuery as $pageNum => $query): ?>
                <a href="/?<?= e($query) ?>" class="pagination__link px-4 <?= $currentPage === $pageNum + 1 ? 'pagination__link--active' : '' ?>">
                    <?= e((string) ($pageNum + 1)) ?>
                </a>
            <?php endforeach; ?>
        </div>
        <!-- Next Page Link -->
        <div class="-mt-px flex w-0 flex-1 justify-end">
            <?php if ($currentPage < $lastPage): ?>
                <a href="/?<?= e($nextPageQuery) ?>" class="pagination__link pl-1">
                    Next
                    <svg class="pagination__arrow-icon ml-3" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M2 10a.75.75 0 01.75-.75h12.59l-2.1-1.95a.75.75 0 111.02-1.1l3.5 3.25a.75.75 0 010 1.1l-3.5 3.25a.75.75 0 11-1.02-1.1l2.1-1.95H2.75A.75.75 0 012 10z" clip-rule="evenodd" />
                    </svg>
                </a>
            <?php endif; ?>
        </div>
    </nav>
</section>
<!-- End Main Content Area -->
<?php include $this->resolve("partials/_footer.php"); ?>
