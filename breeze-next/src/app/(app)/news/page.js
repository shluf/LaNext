import Header from '@/app/(app)/Header'
import DemoPage from '@/components/news/NewsTable'

export const metadata = {
    title: 'Laravel - News',
}

const News = () => {
    return (
        <>
            <Header title="News" />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 bg-white border-b border-gray-200">
                            The News
                            <DemoPage />
                        </div>
                    </div>
                </div>
            </div>
        </>
    )
}

export default News