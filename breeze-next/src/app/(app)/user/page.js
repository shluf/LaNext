import Header from '@/app/(app)/Header'
import DemoPage from '@/components/user-table/UserTable'

export const metadata = {
    title: 'Laravel - Users',
}

const Users = () => {
    return (
        <>
            <Header title="Users" />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 bg-white border-b border-gray-200">
                            The Users
                            <DemoPage />
                        </div>
                    </div>
                </div>
            </div>
        </>
    )
}

export default Users