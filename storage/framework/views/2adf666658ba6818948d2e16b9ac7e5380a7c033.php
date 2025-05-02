<!DOCTYPE html>
<html lang="en">
<?php
use MLL\GraphiQL\GraphiQLAsset;
?>
<head>
    <meta charset=utf-8/>
    <meta name="viewport"
          content="user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, minimal-ui">
    <title>GraphiQL</title>
    <style>
        body {
            height: 100%;
            margin: 0;
            width: 100%;
            overflow: hidden;
        }

        #graphiql {
            height: 100vh;
        }

        /* Make the explorer feel more integrated */
        .docExplorerWrap {
            overflow: auto !important;
            width: 100% !important;
            height: auto !important;
        }

        .doc-explorer-title-bar {
            font-weight: var(--font-weight-medium);
            font-size: var(--font-size-h2);
            overflow-x: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .doc-explorer-rhs {
            display: none;
        }

        .doc-explorer-contents {
            margin: var(--px-16) 0 0;
        }

        .graphiql-explorer-actions select {
            margin-left: var(--px-12);
        }
    </style>
    <script src="<?php echo e(GraphiQLAsset::reactJS()); ?>"></script>
    <script src="<?php echo e(GraphiQLAsset::reactDOMJS()); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(GraphiQLAsset::graphiQLCSS()); ?>"/>
    <link rel="shortcut icon" href="<?php echo e(GraphiQLAsset::favicon()); ?>"/>
</head>

<body>

<div id="graphiql">Loading...</div>
<script src="<?php echo e(GraphiQLAsset::graphiQLJS()); ?>"></script>
<script src="<?php echo e(GraphiQLAsset::pluginExplorerJS()); ?>"></script>
<script>
    const fetcher = GraphiQL.createFetcher({
        url: '<?php echo e($url); ?>',
        subscriptionUrl: '<?php echo e($subscriptionUrl); ?>',
    });

    function GraphiQLWithExplorer() {
        const [query, setQuery] = React.useState('');

        return React.createElement(GraphiQL, {
            fetcher,
            query,
            onEditQuery: setQuery,
            defaultEditorToolsVisibility: true,
            plugins: [
                GraphiQLPluginExplorer.useExplorerPlugin({
                    query,
                    onEdit: setQuery,
                }),
            ],
            // See https://github.com/graphql/graphiql/tree/main/packages/graphiql#props for available settings
        });
    }

    ReactDOM.render(
        React.createElement(GraphiQLWithExplorer),
        document.getElementById('graphiql'),
    );
</script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\LIS-CICLO2025\EjercicioGraphQL\vendor\mll-lab\laravel-graphiql\src/../views/index.blade.php ENDPATH**/ ?>